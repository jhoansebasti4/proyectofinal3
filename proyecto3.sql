-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 23:45:36
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
-- Base de datos: `proyecto3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(15) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ID`, `DNI`, `Nombre`, `Correo`, `Direccion`, `Fecha_Nacimiento`, `Acciones`) VALUES
(6, '123456789', 'Estudiante 1', 'estudiante1@example.com', 'Dirección 1', '2000-01-01', 'Acciones del alumno 1'),
(7, '987654321', 'Estudiante 2', 'estudiante2@example.com', 'Dirección 2', '2001-02-02', 'Acciones del alumno 2'),
(8, '567891234', 'Estudiante 3', 'estudiante3@example.com', 'Dirección 3', '2002-03-03', 'Acciones del alumno 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_clases`
--

CREATE TABLE `alumnos_clases` (
  `Alumno_ID` int(11) NOT NULL,
  `Clase_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ID` int(11) NOT NULL,
  `Clase` varchar(255) NOT NULL,
  `Maestro` varchar(255) DEFAULT NULL,
  `Alumnos_Inscritos` int(11) DEFAULT NULL,
  `Acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`ID`, `Clase`, `Maestro`, `Alumnos_Inscritos`, `Acciones`) VALUES
(1, 'matematicas', 'lucas', 20, 'Acciones de la clase 1'),
(2, 'idiomas', 'lucas', 15, 'Acciones de la clase 2'),
(3, 'filosofia', 'javier', 10, 'Acciones de la clase 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Clase_Asignada` int(11) DEFAULT NULL,
  `Acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`ID`, `Nombre`, `Email`, `Direccion`, `Fecha_Nacimiento`, `Clase_Asignada`, `Acciones`) VALUES
(4, 'lucas', 'maestro1@example.com', 'Dirección 1', '1975-05-05', 1, 'Acciones del maestro 1'),
(5, 'javier', 'maestro2@example.com', 'Dirección 2', '1980-06-06', 2, 'Acciones del maestro 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_clases`
--

CREATE TABLE `maestros_clases` (
  `Maestro_ID` int(11) NOT NULL,
  `Clase_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Email_Usuario` varchar(255) NOT NULL,
  `Permiso` varchar(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Acciones` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Email_Usuario`, `Permiso`, `Estado`, `Acciones`, `password`) VALUES
(1, 'admin@admin', 'Administrador', 'Activo', 'Acciones del usuario', 'administrador'),
(10, 'email@email', 'Administrador', 'Activo', 'Acciones del usuario', 'email@email');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD PRIMARY KEY (`Alumno_ID`,`Clase_ID`),
  ADD KEY `Clase_ID` (`Clase_ID`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Clase_Asignada` (`Clase_Asignada`);

--
-- Indices de la tabla `maestros_clases`
--
ALTER TABLE `maestros_clases`
  ADD PRIMARY KEY (`Maestro_ID`,`Clase_ID`),
  ADD KEY `Clase_ID` (`Clase_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_clases`
--
ALTER TABLE `alumnos_clases`
  ADD CONSTRAINT `alumnos_clases_ibfk_1` FOREIGN KEY (`Alumno_ID`) REFERENCES `alumnos` (`ID`),
  ADD CONSTRAINT `alumnos_clases_ibfk_2` FOREIGN KEY (`Clase_ID`) REFERENCES `clases` (`ID`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`Clase_Asignada`) REFERENCES `clases` (`ID`);

--
-- Filtros para la tabla `maestros_clases`
--
ALTER TABLE `maestros_clases`
  ADD CONSTRAINT `maestros_clases_ibfk_1` FOREIGN KEY (`Maestro_ID`) REFERENCES `maestros` (`ID`),
  ADD CONSTRAINT `maestros_clases_ibfk_2` FOREIGN KEY (`Clase_ID`) REFERENCES `clases` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
