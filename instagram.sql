-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2017 a las 22:52:30
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `instagram`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(6) NOT NULL AUTO_INCREMENT,
  `comment` varchar(100) NOT NULL,
  `idUser` int(6) NOT NULL,
  `idImage` int(6) NOT NULL,
  `comDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nickname` varchar(40) NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `FK` (`idUser`,`idImage`),
  KEY `comment_ibfk_2` (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`idComment`, `comment`, `idUser`, `idImage`, `comDate`, `nickname`) VALUES
(1, 'Holo', 4, 1, '2017-05-23 13:04:43', 'teocrito'),
(5, 'Hola', 4, 2, '2017-05-24 20:02:16', 'teocrito'),
(6, 'Hello', 4, 1, '2017-05-24 20:02:57', 'teocrito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gusta`
--

CREATE TABLE IF NOT EXISTS `gusta` (
  `idLike` int(6) NOT NULL AUTO_INCREMENT,
  `idUser` int(6) DEFAULT NULL,
  `idImage` int(6) DEFAULT NULL,
  PRIMARY KEY (`idLike`),
  KEY `FK` (`idUser`,`idImage`),
  KEY `gusta_ibfk_2` (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `gusta`
--

INSERT INTO `gusta` (`idLike`, `idUser`, `idImage`) VALUES
(1, 4, 1),
(3, 4, 1),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `idUser` int(6) DEFAULT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idImage`),
  KEY `FK` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`idImage`, `name`, `idUser`, `uploadDate`) VALUES
(1, '1495544671.jpg', 4, '2017-05-23 13:04:31'),
(2, '1495544710.jpg', 4, '2017-05-23 13:05:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `idMark` int(6) NOT NULL AUTO_INCREMENT,
  `idUser` int(6) DEFAULT NULL,
  `idImage` int(6) DEFAULT NULL,
  PRIMARY KEY (`idMark`),
  KEY `FK` (`idUser`,`idImage`),
  KEY `mark_ibfk_2` (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mark`
--

INSERT INTO `mark` (`idMark`, `idUser`, `idImage`) VALUES
(1, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `mail` varchar(35) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `username`, `mail`, `nickname`, `password`, `regDate`) VALUES
(4, 'Teo Carlos', 'teo@gmail.com', 'teocrito', '81dc9bdb52d04dc20036dbd8313ed055', '2017-05-22 05:00:00'),
(5, 'Edgar Osornio', 'osovel@hotmail.com', 'osovel', '81dc9bdb52d04dc20036dbd8313ed055', '2017-05-22 05:00:00'),
(6, 'Mauricio Corona', 'sasuke_arti@hotmail.com', 'nuhg', '81dc9bdb52d04dc20036dbd8313ed055', '2017-05-23 05:00:00'),
(7, 'canito', 'jorge@jorge', 'cano', '81dc9bdb52d04dc20036dbd8313ed055', '2017-05-23 05:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`) ON DELETE CASCADE;

--
-- Filtros para la tabla `gusta`
--
ALTER TABLE `gusta`
  ADD CONSTRAINT `gusta_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `gusta_ibfk_2` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`) ON DELETE CASCADE;

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_ibfk_2` FOREIGN KEY (`idImage`) REFERENCES `image` (`idImage`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
