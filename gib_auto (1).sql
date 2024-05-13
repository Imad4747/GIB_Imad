-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 13 mei 2024 om 00:11
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `firstname`, `lastname`, `email`, `message`, `file`, `date`) VALUES
(1, 'nvn', 'bvnvbn', 'email@email.emailvv', 'vbnvn', '', '2023-11-23 07:43:50'),
(2, 'juj', 'juj', 'email@email.emailvvuj', 'jujujujujuj', 0x6176617461722e6a7067, '2023-11-23 08:08:29'),
(3, 'bfgbgfb', 'fgbfgbfg', 'email@email.email', 'zferfref', 0x747572626f2e706e67, '2023-11-27 14:36:31'),
(4, 'qq', 'qq', 'email@email.emailvvqq', 'qq', 0x72382e706e67, '2023-11-27 14:39:35'),
(5, 'aa', 'aa', 'aa@aa.com', 'aa', '', '2024-05-12 22:40:15'),
(6, 'aa', 'aa', 'aa@aa.com', 'aa', '', '2024-05-12 22:41:38');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblfav`
--

INSERT INTO `tblfav` (`id`, `userid`, `product_id`) VALUES
(5, 17, 1),
(8, 14, 1),
(4, 12, 4),
(7, 17, 4),
(15, 23, 5),
(14, 23, 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblorder`
--

INSERT INTO `tblorder` (`order_id`, `userid`, `product`, `model`, `totalPrice`, `date_order`) VALUES
(5, 14, 'Mercedes', 'AMG GT', 190000, '2024-04-26'),
(6, 23, 'Porsche', '911 Turbo S', 32055000, '2024-05-12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblparts`
--

DROP TABLE IF EXISTS `tblparts`;
CREATE TABLE IF NOT EXISTS `tblparts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_ID` int NOT NULL,
  `parts` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblparts`
--

INSERT INTO `tblparts` (`id`, `model_ID`, `parts`) VALUES
(1, 1, '[\"Object_9\", \"Object_4\", \"Object_6\", \"Object_23\", \"Object_29\", \"Object_11\", \"Object_13\", \"Object_17\", \"Object_19\", \"Object_38\", \"Object_42\"]'),
(2, 2, '[\"Object_8\"]'),
(3, 3, '[\"Plane_                _0\"]'),
(4, 4, '[\r\n  \"AMG_hood_bodypaint_0\",\r\n  \"G-class_body_AMG_bodypaint_0\",\r\n  \"G-class_fender_L_AMG_bodypaint_0\",\r\n  \"G-class_fender_R_bodypaint_0\",\r\n  \"AMG_front_bamper_bodypaint_0\",\r\n  \"G-class_headlightframe_R_AMG_bodypaint_0\",\r\n  \"G-class_headlightframe_L_AMG_bodypaint_0\",\r\n  \"AMG_tailgate_bodypaint_0\",\r\n  \"G-class_FR_door_AMG_bodypaint_0\",\r\n  \"G-class_RR_door_bodypaint_0\",\r\n  \"G-class_FL_door_AMG_bodypaint_0\",\r\n  \"G-class_RL_door_bodypaint_0\",\r\n  \"AMG_frontwide_fender_L_bodypaint_0\",\r\n  \"AMG_rearwide_fender_L_bodypaint_0\",\r\n  \"AMG_rearwide_fender_R_bodypaint_0\",\r\n  \"AMG_frontwide_fender_R_bodypaint_0\",\r\n  \"G-class_mirror_R_bodypaint_0\",\r\n  \"G-class_mirror_L_bodypaint_0\",\r\n  \"AMG_grill_bodypaint_0\",\r\n  \"AMG_rear_bamper_bodypaint_0\",\r\n  \"AMG_sparetire_bodypaint_0\", \"AMG_running_board_L_bodypaint_0\", \"AMG_running_board_R_bodypaint_0\"\r\n]\r\n'),
(5, 5, '[\r\n  \"SL63_fender_R_SL63_paint_0\",\r\n  \"SL63_hood_SL63_paint_0\",\r\n  \"SL63_door_R_SL63_paint_0\",\r\n  \"SL63_body_SL63_paint_0\",\r\n  \"SL63_bumper_F_SL63_paint_0\",\r\n  \"SL63_fender_L_SL63_paint_0\",\r\n  \"SL63_door_L_SL63_paint_0\",\r\n  \"SL63_body_SL63_paint_0\",\r\n  \"SL63_bumper_R_SL63_paint_0\",\r\n  \"SL63_trunk_SL63_paint_0\",\r\n  \"SL63_diffuser_R-crb_SL63_carbon_0\",\r\n  \"SL63_sideskirt-L-crb_SL63_paint_0\",\r\n  \"SL63_sideskirt-L-crb_SL63_carbon_0\",\r\n  \"SL63_fender_L_SL63_carbon_0\",\r\n  \"SL63_mirror_L_SL63_black_0\",\r\n  \"SL63_body_SL63_black_0\",\r\n  \"SL63_bumper_F_SL63_black_0\",\r\n  \"SL63_sideskirt-R.-crb_SL63_carbon_0\",\r\n  \"SL63_sideskirt-R.-crb_SL63_paint_0\",\r\n  \"SL63_fender_R_SL63_carbon_0\",\r\n  \"SL63_mirror_R_SL63_black_0\"\r\n]\r\n'),
(6, 6, '[\r\n  \"sw222_hood_2013_sw222_paint_0\",\r\n  \"sw222_door_FL_chrome_2_2_sw222_paint_0\",\r\n  \"sw222_door_RL_chrome_2_2_sw222_paint_0\",\r\n  \"sw222_mirror_L_sw222_paint_0\",\r\n  \"sw222_door_RR_chrome_2_2_sw222_paint_0\",\r\n  \"sw222_door_FR_chrome_2_2_sw222_paint_0\",\r\n  \"sw222_mirror_R_sw222_paint_0\",\r\n  \"sw222_sideskirt_amg_sw222_paint_0\",\r\n  \"sw222_fender_R_2017_sw222_paint_0\",\r\n  \"sw222_fender_L_2017_sw222_paint_0\",\r\n  \"sw222_body_sw222_paint_0\",\r\n  \"sw222_bumper_R_amg_2017_2_sw222_paint_0\",\r\n  \"sw222_trunk_chrome_2_sw222_paint_0\",\r\n  \"sw222_bumper_F_brabus_2017_sw222_paint_0\"\r\n]\r\n'),
(7, 7, '[\"Object_128\", \r\n\"Object_130\r\n\"]');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tblpaths`
--

DROP TABLE IF EXISTS `tblpaths`;
CREATE TABLE IF NOT EXISTS `tblpaths` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameModel` text NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblpaths`
--

INSERT INTO `tblpaths` (`id`, `nameModel`, `path`) VALUES
(1, 'Amg GT', 'public/mercedes-benz_amg-gt_2015/scene.gltf'),
(2, '911', 'public/911/scene.gltf'),
(3, 'RS7', 'public/rs7/scene.gltf'),
(4, 'g63', 'public/g63/scene.gltf'),
(5, 'amg sl', 'public/sl/scene.gltf'),
(6, 's63', 'public/sklasse/scene.gltf'),
(7, 'R8', 'public/r8/scene.gltf');

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
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `year_car` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `name`, `model`, `price`, `photo`, `year_car`) VALUES
(1, 'Mercedessss', 'AMG GT', 198965.99, 'gt.png', 2021),
(2, 'Porsche', '911 Turbo S', 320000, 'turbo.png', 2023),
(3, 'Audi', 'RS5', 130000, 'rs.png', 2021),
(4, 'Mercedes', 'G63 AMG', 2000000, 'g.png', 2022),
(5, 'Mercedes', 'AMG SL Roadster', 130800, 'sl.png', 2021),
(6, 'Mercedes', 'AMG S 63', 201025, 's.png', 2022),
(7, 'Audi', 'R8', 231000, 'r8.png', 2022);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblspecs`
--

INSERT INTO `tblspecs` (`specID`, `topspeed`, `horsepower`, `accelaration`, `fuel`, `transmission`, `cartype`, `description`, `pic`, `pic2`, `pic3`) VALUES
(1, 315, 585, 3.2, 'Benzine', 'Manual', 'Sedan', 'The Mercedes-AMG GT is a sleek and powerful sports car renowned for its dynamic performance and striking design. With a handcrafted engine, precise handling, and luxurious interior, it offers an exhilarating driving experience.', 'gt1.jpg', 'gt2.jpg', 'gt3.jpg'),
(2, 330, 650, 3.6, 'Electric', 'Manual', 'Sedan', 'The Porsche 911 Turbo S is an iconic high-performance sports car known for its powerful turbocharged engine, precise handling, and timeless design. With exhilarating acceleration and advanced technology, it delivers an unmatched driving experience that embodies the essence of automotive excellence.\r\n\r\n\r\n\r\n\r\n\r\n', 'turbo1.webp', 'turbo2.webp', 'turbo3.webp'),
(3, 305, 630, 4.1, 'Benzine', 'Automatic', 'Coupé', 'The Audi RS5 Avant is a high-performance luxury wagon known for its blend of power, practicality, and sophistication. It features a potent engine, all-wheel drive, and a spacious interior, making it a versatile and thrilling choice for enthusiasts.', 'rs6.avif', 'rs62.webp', 'rs63.jpg'),
(4, 220, 585, 4.5, 'Electric', 'Manual', 'Coupé', 'The Mercedes-AMG G63 is an iconic luxury SUV known for its rugged off-road capabilities and powerful performance. With its distinctive boxy design, advanced technology, and luxurious interior, it delivers an unmatched combination of style and capability.', 'g63.jpg', 'g632.avif', 'g633.png'),
(5, 320, 621, 2.3, 'Benzine', 'Automatic', 'Wagon', 'The Mercedes-AMG SL Roadster is a legendary convertible sports car known for its thrilling performance and open-air driving experience. With its powerful engine, sleek design, and luxurious amenities, it offers an exhilarating and stylish way to enjoy the open road.', 'sl.avif', 'sl2.avif', 'sl3.avif'),
(6, 300, 523, 3.9, 'Electric', 'Automatic', 'Sedan', ' The Mercedes-AMG S63 is a high-performance luxury sedan known for its powerful engine, opulent interior, and advanced technology. With its blend of performance and comfort, it provides a luxurious and exhilarating driving experience for those who demand the best.', 's1.jpg', 's2.jpg', 's3.webp'),
(7, 300, 563, 2, 'Benzine', 'Manual', 'Cabrio', 'sss', 'r81.jpg', 'r82.jpg', 'r83.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tblusers`
--

INSERT INTO `tblusers` (`id`, `firstname`, `lastname`, `email`, `password`, `createdAt`, `role`) VALUES
(1, 'ss', 'ss', 'ss@ss.com', '$2y$10$lclLbO8Lktzx.yYe2UxNl.a9zslT7seNMNme6JHEzG0dhyNm2pf52', '2023-10-13 21:52:40', 'Admin'),
(24, 'aa', 'aa', 'email@email.emailaa', '$2y$10$53IA7dxO1xXct0gmtrYfkeC5rEL6RaQj9NvdnJuzNZ5EexjOhXRo.', '2024-04-26 12:55:35', 'Admin'),
(23, 'vv', 'vv', 'email@email.emailvv', '$2y$10$i2EiO/zI5Z1u7BI1kGgoOuTtoWvuNhzJdQwwnWBcpfEAxEl6iip/q', '2024-04-26 12:53:00', 'Guest'),
(25, 'qq', 'qq', 'qq@qq.com', '$2y$10$ghJTA/Z9ExcW3HUv5Dy4OOFFFwPKZK58DPuYRYsBTfbk5.68aVkci', '2024-05-12 13:29:17', 'Admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
