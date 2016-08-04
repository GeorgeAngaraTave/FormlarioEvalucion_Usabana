-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2016 a las 04:22:37
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fomulario_evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosformularios`
--

CREATE TABLE `comentariosformularios` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `comentario2` text NOT NULL,
  `comentario3` text NOT NULL,
  `comentario4` text NOT NULL,
  `comentario5` text NOT NULL,
  `comentario6` text NOT NULL,
  `comentario7` text NOT NULL,
  `comentario8` text NOT NULL,
  `comentario9` text NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CodigoProfesor` int(11) NOT NULL,
  `CodigoAlumno` int(11) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `CodigoCreacion` int(11) NOT NULL,
  `Campo1` text,
  `Campo2` varchar(80) DEFAULT NULL,
  `Campo3` varchar(80) DEFAULT NULL,
  `Campo4` text,
  `Campo5` text,
  `Campo6` text,
  `Tabla1` text,
  `Tabla2` text,
  `Campo35` varchar(80) DEFAULT NULL,
  `Campo36` varchar(80) DEFAULT NULL,
  `Campo37` varchar(80) DEFAULT NULL,
  `Campo38` text,
  `Tabla3` text,
  `Tabla4` text,
  `Campo52` text,
  `Campo53` text,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CodigoComentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangofecha`
--

CREATE TABLE `rangofecha` (
  `id` int(11) NOT NULL,
  `FechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FechaFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CodCeacionForm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rangofecha`
--

INSERT INTO `rangofecha` (`id`, `FechaInicio`, `FechaFin`, `CodCeacionForm`) VALUES
(1, '2016-08-02 05:00:00', '2016-08-31 05:00:00', 20162),
(2, '2016-08-01 21:44:06', '0000-00-00 00:00:00', 0),
(3, '2016-08-02 05:00:00', '2016-08-31 05:00:00', 20163);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Nombres` varchar(60) NOT NULL,
  `Email` varchar(90) NOT NULL,
  `Codigo_profesor` int(11) DEFAULT NULL,
  `Fomulario` int(2) DEFAULT NULL,
  `CorreoEnviado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Codigo`, `Nombres`, `Email`, `Codigo_profesor`, `Fomulario`, `CorreoEnviado`) VALUES
(1, 123456789, 'Yasbley Segovia', 'yasbleysegovia@unisabana.edu.co\r\n', 0, 3, 0),
(28, 201415080, 'Luis Guillermo Lopez Lopez', 'luisloplo@unisabana.edu.co', 123456789, 0, 0),
(29, 201422126, 'Sanchez Perico Sonia Adriana', 'soniasape@unisabana.edu.co', 123456789, 0, 0),
(31, 201422130, 'Rojas Higuera Javier Antonio', 'javierrohi@unisabana.edu.co', 123456789, 0, 0),
(2, 201424539, 'Diana CarolinaFranco Romero', 'dianafrro@unisabana.edu.co\r\n', 123456789, 0, 0),
(3, 201424676, 'AlexanderAvendano Grijalba', 'alexanderavgr@unisabana.edu.co\r\n', 123456789, 0, 0),
(6, 201424723, 'NancyHernandez Palacios', 'nancyhe@unisabana.edu.co', 123456789, 0, 0),
(30, 201424758, 'Casallas Torres Luz Mery', 'luzcato@unisabana.edu.co', 123456789, 0, 0),
(7, 201425012, 'Carlos ArturoRodriguez Villalobos', 'carlosrovi@unisabana.edu.co', 123456789, 0, 0),
(8, 201510122, 'MaritzaVillalobos Cuchivague', 'maritzavicu@unisabana.edu.co', 123456789, 0, 0),
(9, 201510144, 'Silvia EsperanzaAldana Leon', 'silviaalle@unisabana.edu.co', 123456789, 0, 0),
(10, 201510681, 'Sonia EdithPacheco', 'soniapa@unisabana.edu.co', 123456789, 0, 0),
(11, 201511271, 'Luis EmilioEspitia Sanchez', 'luisessa@unisabana.edu.co', 123456789, 0, 0),
(12, 201511643, 'Jorge AlbertoOsorio Villa', 'jorgeosvi@unisabana.edu.co', 123456789, 0, 0),
(13, 201511954, 'Ximena ConstanzaArdila Sanchez', 'ximenaardsa@unisabana.edu.co', 123456789, 0, 0),
(14, 201512458, 'Carmen LuisaTovio Tovio', 'carmentoto@unisabana.edu.co', 123456789, 0, 0),
(15, 201513087, 'Claudia PatriciaUrbina Hernandez', 'claudiaurhe@unisabana.edu.co', 123456789, 0, 0),
(16, 201513289, 'Luis EduardoVargas Tellez', 'luisvate@unisabana.edu.co', 123456789, 0, 0),
(17, 201516872, 'Juan PabloZambrano Sanjuan', 'juanzamsa@unisabana.edu.co', 123456789, 0, 0),
(18, 201516969, 'Diana MarcelaSoto Artunduaga', 'dianasoar@unisabana.edu.co', 123456789, 0, 0),
(19, 201517083, 'Lisseth RocioPupo Jaramillo', 'lisseth.pupo@unisabana.edu.co', 123456789, 0, 0),
(20, 201517187, 'Jhonn FredySalas Lopez', 'jhonnsalo@unisabana.edu.co', 123456789, 0, 0),
(21, 201518097, 'Lizeth KatherineSalazar Piza', 'lizethsapi@unisabana.edu.co', 123456789, 0, 0),
(22, 201518143, 'Monica LilianaPlazas Rivera', 'monicaplri@unisabana.edu.co', 123456789, 0, 0),
(23, 201518154, 'Jonh RicardoMadero Cubillos', 'jonhmacu@unisabana.edu.co', 123456789, 0, 0),
(24, 201518225, 'Diana MariaValencia Carvajal', 'dianavalca@unisabana.edu.co', 123456789, 0, 0),
(25, 201518296, 'NelsonPino Salazar', 'nelsonpisa@unisabana.edu.co', 123456789, 0, 0),
(26, 201518381, 'Julieth JohannaCordon Sierra', 'juliethcosi@unisabana.edu.co', 123456789, 0, 0),
(27, 201518399, 'Paul FernandoUrzola Nunez', 'paulurnu@unisabana.edu.co', 123456789, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentariosformularios`
--
ALTER TABLE `comentariosformularios`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `rangofecha`
--
ALTER TABLE `rangofecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentariosformularios`
--
ALTER TABLE `comentariosformularios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rangofecha`
--
ALTER TABLE `rangofecha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
