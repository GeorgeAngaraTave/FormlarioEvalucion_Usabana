-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2016 a las 05:47:36
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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Nombres` varchar(60) NOT NULL,
  `Email` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosformularios`
--

CREATE TABLE `comentariosformularios` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Campo1` text NOT NULL,
  `Campo2` varchar(80) NOT NULL,
  `Campo3` varchar(80) NOT NULL,
  `Campo4` text NOT NULL,
  `Campo5` text NOT NULL,
  `Campo6` text NOT NULL,
  `Campo7` varchar(80) NOT NULL,
  `Campo8` varchar(80) NOT NULL,
  `Campo9` varchar(80) NOT NULL,
  `Campo10` varchar(80) NOT NULL,
  `Campo11` varchar(80) NOT NULL,
  `Campo12` text NOT NULL,
  `Campo13` varchar(80) NOT NULL,
  `Campo14` varchar(80) NOT NULL,
  `Campo15` text NOT NULL,
  `Campo16` text NOT NULL,
  `Campo17` text NOT NULL,
  `Campo18` text NOT NULL,
  `Campo19` varchar(80) NOT NULL,
  `Campo20` varchar(80) NOT NULL,
  `Campo21` varchar(80) NOT NULL,
  `Campo22` varchar(80) NOT NULL,
  `Campo23` varchar(80) NOT NULL,
  `Campo24` text NOT NULL,
  `Campo25` varchar(80) NOT NULL,
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
  `Campo1` text NOT NULL,
  `Campo2` varchar(80) NOT NULL,
  `Campo3` varchar(80) NOT NULL,
  `Campo4` text NOT NULL,
  `Campo5` text NOT NULL,
  `Campo6` text NOT NULL,
  `Campo7` varchar(80) NOT NULL,
  `Campo8` varchar(80) NOT NULL,
  `Campo9` varchar(80) NOT NULL,
  `Campo10` varchar(80) NOT NULL,
  `Campo11` varchar(80) NOT NULL,
  `Campo12` text NOT NULL,
  `Campo13` varchar(80) NOT NULL,
  `Campo14` varchar(80) NOT NULL,
  `Campo15` text NOT NULL,
  `Campo16` text NOT NULL,
  `Campo17` text NOT NULL,
  `Campo18` text NOT NULL,
  `Campo19` varchar(80) NOT NULL,
  `Campo20` varchar(80) NOT NULL,
  `Campo21` varchar(80) NOT NULL,
  `Campo22` varchar(80) NOT NULL,
  `Campo23` varchar(80) NOT NULL,
  `Campo24` text NOT NULL,
  `Campo25` varchar(80) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CodigoComentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Id` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Nombres` varchar(60) NOT NULL,
  `Email` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `numero`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 5),
(7, 5),
(8, 7),
(9, 1),
(10, 1),
(11, 10);

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
  `CodigoForm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Codigo`, `Nombres`, `Email`, `Codigo_profesor`, `Fomulario`, `CodigoForm`) VALUES
(1, 123456789, 'Yasbley Segovia', 'yasbleysegovia@unisabana.edu.co\r\n', 0, 3, 3),
(28, 201415080, 'Luis Guillermo Lopez Lopez', 'luisloplo@unisabana.edu.co', 123456789, 0, 0),
(29, 201422126, 'Sanchez Perico Sonia Adriana', 'soniasape@unisabana.edu.co', 123456789, 0, 0),
(31, 201422130, 'Rojas Higuera Javier Antonio', 'javierrohi@unisabana.edu.co', 123456789, 0, 0),
(2, 201424539, 'Diana CarolinaFranco Romero', 'dianafrro@unisabana.edu.co\r\n', 123456789, 0, 0),
(3, 201424676, 'AlexanderAvendano Grijalba', 'alexanderavgr@unisabana.edu.co\r\n', 123456789, 0, 0),
(6, 201424723, 'NancyHernandez Palacios', 'nancyhe@unisabana.edu.co', 123456789, 0, 0),
(30, 201424758, 'Casallas Torres Luz Mery', 'luzcato@unisabana.edu.co', 123456789, 0, 0),
(7, 201425012, 'Carlos ArturoRodriguez Villalobos', 'carlosrovi@unisabana.edu.co', 123456789, 0, 0),
(8, 201510122, 'MaritzaVillalobos Cuchivague', 'maritzavicu@unisabana.edu.co', 123456789, 1, 0),
(9, 201510144, 'Silvia EsperanzaAldana Leon', 'silviaalle@unisabana.edu.co', 123456789, 1, 0),
(10, 201510681, 'Sonia EdithPacheco', 'soniapa@unisabana.edu.co', 123456789, 1, 0),
(11, 201511271, 'Luis EmilioEspitia Sanchez', 'luisessa@unisabana.edu.co', 123456789, 1, 0),
(12, 201511643, 'Jorge AlbertoOsorio Villa', 'jorgeosvi@unisabana.edu.co', 123456789, 1, 0),
(13, 201511954, 'Ximena ConstanzaArdila Sanchez', 'ximenaardsa@unisabana.edu.co', 123456789, 1, 0),
(14, 201512458, 'Carmen LuisaTovio Tovio', 'carmentoto@unisabana.edu.co', 123456789, 1, 0),
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
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
