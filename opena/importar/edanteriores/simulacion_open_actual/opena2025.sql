-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2025 a las 10:56:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `opena1800`
--
CREATE DATABASE IF NOT EXISTS `opena1800` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `opena1800`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasifica`
--

CREATE TABLE `clasifica` (
  `puesto` int(3) NOT NULL,
  `idjugador` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadropremio`
--

CREATE TABLE `cuadropremio` (
  `idpremio` int(2) NOT NULL,
  `orden` int(2) NOT NULL,
  `valor` int(4) NOT NULL,
  `idjugador` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuadropremio`
--

INSERT INTO `cuadropremio` (`idpremio`, `orden`, `valor`, `idjugador`) VALUES
(1, 1, 2300, ''),
(1, 2, 1200, ''),
(1, 3, 650, ''),
(1, 4, 550, ''),
(1, 5, 500, ''),
(1, 6, 400, ''),
(1, 7, 300, ''),
(1, 8, 250, ''),
(1, 9, 200, ''),
(1, 10, 150, ''),
(1, 11, 100, ''),
(1, 12, 100, ''),
(2, 1, 500, ''),
(2, 2, 400, ''),
(2, 3, 300, ''),
(2, 4, 200, ''),
(2, 5, 100, ''),
(3, 1, 225, ''),
(3, 2, 150, ''),
(3, 3, 120, ''),
(3, 4, 100, ''),
(4, 1, 150, ''),
(4, 2, 100, ''),
(5, 1, 125, ''),
(5, 2, 125, ''),
(5, 3, 125, ''),
(5, 4, 125, ''),
(5, 5, 125, ''),
(5, 6, 125, ''),
(5, 7, 125, ''),
(5, 8, 125, ''),
(5, 9, 125, ''),
(5, 10, 125, ''),
(5, 11, 125, ''),
(5, 12, 125, ''),
(5, 13, 125, ''),
(5, 14, 125, ''),
(5, 15, 125, ''),
(5, 16, 125, ''),
(5, 17, 125, ''),
(5, 18, 125, ''),
(5, 19, 125, ''),
(5, 20, 125, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `idjugador` varchar(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `elo` int(4) NOT NULL,
  `origen` char(3) NOT NULL,
  `hotel` set('S','N') NOT NULL,
  `ranking` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`idjugador`, `nombre`, `elo`, `origen`, `hotel`, `ranking`) VALUES
('1116657', 'Stachanczyk, Jacek', 2129, 'PZS', 'S', 32),
('1119052', 'Migala, Andrzej', 1892, 'PZS', 'S', 79),
('1157329', 'Gawle, Ireneusz', 1823, 'Pol', 'S', 86),
('1185250', 'Jankowiak, Piotr', 2093, 'Pol', 'S', 42),
('1202936', 'Sofronie, Iulian', 2349, 'Rum', 'S', 6),
('1206508', 'Draghici Flutur, Gavril', 2074, 'ONC', 'S', 47),
('1223160', 'Ambru, Dan-Calin', 2007, 'CS', 'S', 58),
('1288989', 'Sunea, Sara Maria', 2083, 'Rum', 'S', 45),
('1296671', 'Sofronie, Vladimir', 2236, 'Rum', 'S', 16),
('13303970', 'Manukyan, Sargis A.', 2322, 'Arm', 'S', 7),
('13505130', 'Tsyhanchuk, Stanislav', 2274, '', 'S', 11),
('14339544', 'Felix, Raphael', 2290, 'Sud', 'S', 9),
('1541030', 'Rustan, Elias Buschmann', 1907, 'Nor', 'S', 74),
('1555375', 'Stuhaug, Raphael Iglesisas', 1839, 'Nor', 'S', 84),
('1569520', 'Vollheim, Daniel O', 1808, 'Nor', 'S', 88),
('16246950', 'Witter, Jannes', 1881, 'Ale', 'S', 80),
('1805592', 'Williams, Duncan', 1897, 'Gal', 'S', 77),
('1935364', 'Basualdo De Ornelas, Jorge', 1826, 'Las', 'S', 85),
('20300204', 'Ezra Paul Chambers', 2362, 'Bur', 'S', 4),
('21816107', 'Redzisz, Michal', 2254, 'Pol', 'S', 13),
('21886717', 'Racis, Michal', 2060, 'PZS', 'S', 50),
('2202999', 'Palomo Teruel, Xavier', 2137, 'Cat', 'S', 29),
('2207540', 'Soriano Maya, Juan Pablo', 2106, 'VAL', 'S', 38),
('2207915', 'Martin Rodriguez, Emilio', 2018, 'Vil', 'S', 56),
('2209721', 'Marquinez Cabrejas, Francisco ', 1894, 'Pa?', 'S', 78),
('2213966', 'Blanco Sanjuan, Jorge', 2056, 'Mad', 'S', 52),
('2218151', 'Gomez Anadon, Daniel', 2198, 'And', 'S', 19),
('2219743', 'Zanoletty Garcia, David', 1934, 'ONC', 'S', 69),
('2220300', 'Martin Martin, Luis Vicente', 2000, 'Mad', 'S', 61),
('2221470', 'Horcajada Reales, Guillermo', 2084, 'Ast', 'S', 44),
('22221093', 'Cubillo Munoz, Miguel', 2147, 'Mad', 'S', 26),
('22247289', 'Nicolas Zapata, Javier', 2124, 'Ras', 'S', 34),
('22274960', 'Gomez Sanjuan, Hector Fernando', 2235, 'Alc', 'S', 17),
('22299459', 'Ramirez Maillo, Juan Adonay', 1963, 'Tel', 'S', 65),
('2230070', 'Olivera Gutierrez, Albert', 1953, 'ONC', 'S', 67),
('2231000', 'Fernandez Manrique, Agustin', 2013, 'ONC', 'S', 57),
('2231743', 'Sanchez Saez, Francisco', 2241, 'VAL', 'S', 15),
('2237733', 'O`Neill Y Daneiko, Jose Antoni', 1924, 'Gam', 'S', 70),
('2238276', 'Serarols Mabras, Bernat', 2264, 'And', 'S', 12),
('2240416', 'Salvador Cabo, Cesar', 2059, 'Mad', 'S', 51),
('2244969', 'Rey Malde, Henrique', 2174, 'Our', 'S', 23),
('2246678', 'Mingarro Carceller, Sergi', 2282, 'VAL', 'S', 10),
('2263076', 'Medarde Santiago, Luis Marcos', 2436, 'Pad', 'S', 1),
('2273012', 'Sanchez Barbado, Carlos', 2063, 'La', 'S', 48),
('2278677', 'Sakulski, Bernard', 2018, 'Gal', 'S', 55),
('2287820', 'Munoz Suarez, Luis Alberto', 1964, 'Zar', 'S', 64),
('23714930', 'Dudarec, Elias', 1846, 'Rep', 'S', 82),
('23716150', 'Bara, Jan', 1962, 'Rep', 'S', 66),
('23752670', 'Borecky, Andrej', 1858, 'Rep', 'S', 81),
('2400111', 'Mannion, Stephen R', 2178, 'Esc', 'S', 22),
('24511668', 'Atienza Alvarez, Javier', 2185, 'VAL', 'S', 21),
('24640352', 'Gruenter, Martin', 2194, 'Ale', 'S', 20),
('2500060', 'Delaney, John', 2137, 'Irl', 'S', 28),
('2500736', 'Fox, Anthony', 1921, 'Irl', 'S', 72),
('2500884', 'Cafolla, Peter', 1902, 'Irl', 'S', 76),
('25198866', 'Albin Sajan', 2101, 'Ind', 'S', 39),
('25198874', 'Abel Sajan', 2046, 'Ind', 'S', 53),
('25974300', 'Jess Ruchandani', 1967, 'Ind', 'S', 63),
('2817247', 'Lumachi, Gabriele', 2430, 'Ita', 'S', 2),
('32015631', 'Martinez Gonzalez, Miguel A.', 2004, 'CD', 'S', 59),
('32018746', 'Ramirez Maillo, Cristian', 2112, 'Las', 'S', 35),
('32049072', 'Sendra Tormo, Juan', 2026, 'VAL', 'S', 54),
('32065698', 'Rodriguez Redondo, Adhara', 2208, 'Ben', 'S', 18),
('32070934', 'Jimenez Fernandez, Rebeca', 2163, 'Zar', 'S', 24),
('33368783', 'Yasaswi Krishna Bommi', 1844, 'Ind', 'S', 83),
('33379475', 'Safin Safarullakhan', 1915, 'Ind', 'S', 73),
('33440344', 'Paarshva Parmar', 1922, 'Ind', 'S', 71),
('34178449', 'Farkash, Denys', 2111, 'Ucr', 'S', 36),
('34346643', 'Bukharkov, Stepan', 2108, 'VAL', 'S', 37),
('3908453', 'Martinez Cardenas, Sebastian H', 2099, 'Ven', 'S', 41),
('3909085', 'Boyer Censore, Giuseppe Enmanu', 2127, 'Ven', 'S', 33),
('4402308', 'Hernandez, Cristian Andres', 2355, 'Col', 'S', 5),
('4656997', 'Koenig, Christian', 2061, 'Ale', 'S', 49),
('4682033', 'Tonndorf, Matthias', 2133, 'Ale', 'S', 30),
('54535964', 'Deusa Ballesteros, Lucas', 2101, 'VAL', 'S', 40),
('54542987', 'Munoz Osete, Marcos', 2075, 'VAL', 'S', 46),
('54549264', 'Rey Martinez, Jaime', 2317, 'Mad', 'S', 8),
('54579546', 'Bercaru, Vlad Ionut', 2131, 'VAL', 'S', 31),
('54747910', 'Torosyan Saghatelyan, Arturo', 2140, 'Mis', 'S', 27),
('54788455', 'Nechifor, David', 2002, 'VAL', 'S', 60),
('54788633', 'Segarra Victorio, Israel', 2086, 'VAL', 'S', 43),
('5823404', 'Siddharth, Sai', 1905, 'Sin', 'S', 75),
('607835', 'Troffiguer, Olivier', 1950, 'Fra', 'S', 68),
('700720', 'Meszaros, Andras', 2150, 'Hun', 'S', 25),
('809993', 'Delfino, Luigi', 2249, 'Ita', 'S', 14),
('8605220', 'Peng, Tianlu', 1990, 'Chi', 'S', 62),
('885940', 'Favaloro, Andrea', 2406, 'Ita', 'S', 3),
('91105889', 'Lukasiewicz, Ignacy', 1812, 'PZS', 'S', 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optapremio`
--

CREATE TABLE `optapremio` (
  `idjugador` char(8) NOT NULL,
  `idpremio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `optapremio`
--

INSERT INTO `optapremio` (`idjugador`, `idpremio`) VALUES
('1116657', 1),
('1116657', 3),
('1116657', 4),
('1116657', 5),
('1119052', 1),
('1119052', 3),
('1119052', 4),
('1119052', 5),
('1157329', 1),
('1157329', 3),
('1157329', 4),
('1157329', 5),
('1185250', 1),
('1185250', 3),
('1185250', 4),
('1185250', 5),
('1202936', 1),
('1202936', 3),
('1202936', 5),
('1206508', 1),
('1206508', 3),
('1206508', 4),
('1206508', 5),
('1223160', 1),
('1223160', 3),
('1223160', 4),
('1223160', 5),
('1288989', 1),
('1288989', 3),
('1288989', 4),
('1288989', 5),
('1296671', 1),
('1296671', 3),
('1296671', 5),
('13303970', 1),
('13303970', 3),
('13303970', 5),
('13505130', 1),
('13505130', 3),
('13505130', 5),
('14339544', 1),
('14339544', 3),
('14339544', 5),
('1541030', 1),
('1541030', 3),
('1541030', 4),
('1541030', 5),
('1555375', 1),
('1555375', 3),
('1555375', 4),
('1555375', 5),
('1569520', 1),
('1569520', 3),
('1569520', 4),
('1569520', 5),
('16246950', 1),
('16246950', 3),
('16246950', 4),
('16246950', 5),
('1805592', 1),
('1805592', 3),
('1805592', 4),
('1805592', 5),
('1935364', 1),
('1935364', 3),
('1935364', 4),
('1935364', 5),
('20300204', 1),
('20300204', 3),
('20300204', 5),
('21816107', 1),
('21816107', 3),
('21816107', 5),
('21886717', 1),
('21886717', 3),
('21886717', 4),
('21886717', 5),
('2202999', 1),
('2202999', 3),
('2202999', 4),
('2202999', 5),
('2207540', 1),
('2207540', 2),
('2207540', 3),
('2207540', 4),
('2207540', 5),
('2207915', 1),
('2207915', 3),
('2207915', 4),
('2207915', 5),
('2209721', 1),
('2209721', 3),
('2209721', 4),
('2209721', 5),
('2213966', 1),
('2213966', 3),
('2213966', 4),
('2213966', 5),
('2218151', 1),
('2218151', 3),
('2218151', 4),
('2218151', 5),
('2219743', 1),
('2219743', 3),
('2219743', 4),
('2219743', 5),
('2220300', 1),
('2220300', 3),
('2220300', 4),
('2220300', 5),
('2221470', 1),
('2221470', 3),
('2221470', 4),
('2221470', 5),
('22221093', 1),
('22221093', 3),
('22221093', 4),
('22221093', 5),
('22247289', 1),
('22247289', 3),
('22247289', 4),
('22247289', 5),
('22274960', 1),
('22274960', 3),
('22274960', 5),
('22299459', 1),
('22299459', 3),
('22299459', 4),
('22299459', 5),
('2230070', 1),
('2230070', 3),
('2230070', 4),
('2230070', 5),
('2231000', 1),
('2231000', 3),
('2231000', 4),
('2231000', 5),
('2231743', 1),
('2231743', 2),
('2231743', 3),
('2231743', 5),
('2237733', 1),
('2237733', 3),
('2237733', 4),
('2237733', 5),
('2238276', 1),
('2238276', 3),
('2238276', 5),
('2240416', 1),
('2240416', 3),
('2240416', 4),
('2240416', 5),
('2244969', 1),
('2244969', 3),
('2244969', 4),
('2244969', 5),
('2246678', 1),
('2246678', 2),
('2246678', 3),
('2246678', 5),
('2263076', 1),
('2263076', 5),
('2273012', 1),
('2273012', 2),
('2273012', 3),
('2273012', 4),
('2273012', 5),
('2278677', 1),
('2278677', 3),
('2278677', 4),
('2278677', 5),
('2287820', 1),
('2287820', 3),
('2287820', 4),
('2287820', 5),
('23714930', 1),
('23714930', 3),
('23714930', 4),
('23714930', 5),
('23716150', 1),
('23716150', 3),
('23716150', 4),
('23716150', 5),
('23752670', 1),
('23752670', 3),
('23752670', 4),
('23752670', 5),
('2400111', 1),
('2400111', 3),
('2400111', 4),
('2400111', 5),
('24511668', 1),
('24511668', 2),
('24511668', 3),
('24511668', 4),
('24511668', 5),
('24640352', 1),
('24640352', 3),
('24640352', 4),
('24640352', 5),
('2500060', 1),
('2500060', 3),
('2500060', 4),
('2500060', 5),
('2500736', 1),
('2500736', 3),
('2500736', 4),
('2500736', 5),
('2500884', 1),
('2500884', 3),
('2500884', 4),
('2500884', 5),
('25198866', 1),
('25198866', 3),
('25198866', 4),
('25198866', 5),
('25198874', 1),
('25198874', 3),
('25198874', 4),
('25198874', 5),
('25974300', 1),
('25974300', 3),
('25974300', 4),
('25974300', 5),
('2817247', 1),
('2817247', 5),
('32015631', 1),
('32015631', 3),
('32015631', 4),
('32015631', 5),
('32018746', 1),
('32018746', 3),
('32018746', 4),
('32018746', 5),
('32049072', 1),
('32049072', 2),
('32049072', 3),
('32049072', 4),
('32049072', 5),
('32065698', 1),
('32065698', 3),
('32065698', 5),
('32070934', 1),
('32070934', 3),
('32070934', 4),
('32070934', 5),
('33368783', 1),
('33368783', 3),
('33368783', 4),
('33368783', 5),
('33379475', 1),
('33379475', 3),
('33379475', 4),
('33379475', 5),
('33440344', 1),
('33440344', 3),
('33440344', 4),
('33440344', 5),
('34178449', 1),
('34178449', 3),
('34178449', 4),
('34178449', 5),
('34346643', 1),
('34346643', 2),
('34346643', 3),
('34346643', 4),
('34346643', 5),
('3908453', 1),
('3908453', 3),
('3908453', 4),
('3908453', 5),
('3909085', 1),
('3909085', 3),
('3909085', 4),
('3909085', 5),
('4402308', 1),
('4402308', 3),
('4402308', 5),
('4656997', 1),
('4656997', 3),
('4656997', 4),
('4656997', 5),
('4682033', 1),
('4682033', 3),
('4682033', 4),
('4682033', 5),
('54535964', 1),
('54535964', 2),
('54535964', 3),
('54535964', 4),
('54535964', 5),
('54542987', 1),
('54542987', 2),
('54542987', 3),
('54542987', 4),
('54542987', 5),
('54549264', 1),
('54549264', 3),
('54549264', 5),
('54579546', 1),
('54579546', 2),
('54579546', 3),
('54579546', 4),
('54579546', 5),
('54747910', 1),
('54747910', 3),
('54747910', 4),
('54747910', 5),
('54788455', 1),
('54788455', 2),
('54788455', 3),
('54788455', 4),
('54788455', 5),
('54788633', 1),
('54788633', 2),
('54788633', 3),
('54788633', 4),
('54788633', 5),
('5823404', 1),
('5823404', 3),
('5823404', 4),
('5823404', 5),
('607835', 1),
('607835', 3),
('607835', 4),
('607835', 5),
('700720', 1),
('700720', 3),
('700720', 4),
('700720', 5),
('809993', 1),
('809993', 3),
('809993', 5),
('8605220', 1),
('8605220', 3),
('8605220', 4),
('8605220', 5),
('885940', 1),
('885940', 5),
('91105889', 1),
('91105889', 3),
('91105889', 4),
('91105889', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio`
--

CREATE TABLE `premio` (
  `idpremio` int(2) NOT NULL,
  `tipo` char(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `prioridad` int(2) NOT NULL,
  `maxelo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `premio`
--

INSERT INTO `premio` (`idpremio`, `tipo`, `nombre`, `prioridad`, `maxelo`) VALUES
(1, 'ELO', 'General', 10, 2700),
(2, 'VAL', 'Comunitat Valenciana', 35, 0),
(3, 'ELO', 'ELO 2400', 20, 2400),
(4, 'ELO', 'ELO 2200', 25, 2200),
(5, 'HOT', 'Alojado Hotel', 40, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasifica`
--
ALTER TABLE `clasifica`
  ADD PRIMARY KEY (`puesto`);

--
-- Indices de la tabla `cuadropremio`
--
ALTER TABLE `cuadropremio`
  ADD PRIMARY KEY (`idpremio`,`orden`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`idjugador`);

--
-- Indices de la tabla `optapremio`
--
ALTER TABLE `optapremio`
  ADD PRIMARY KEY (`idjugador`,`idpremio`);

--
-- Indices de la tabla `premio`
--
ALTER TABLE `premio`
  ADD PRIMARY KEY (`idpremio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
