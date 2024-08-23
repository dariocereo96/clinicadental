-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2024 a las 22:40:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `motivoCita` text NOT NULL,
  `estadoCita` int(11) NOT NULL DEFAULT 0,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `primerNombre` varchar(100) NOT NULL,
  `segundoNombre` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idEspecialidad` int(11) NOT NULL,
  `tipoDocumento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `id` int(11) NOT NULL,
  `fechaAtencion` date NOT NULL,
  `diagnostico` text DEFAULT NULL,
  `procedimiento` text NOT NULL,
  `notas` text NOT NULL,
  `idEspecialidad` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `primerNombre` varchar(100) NOT NULL,
  `segundoNombre` varchar(100) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` varchar(100) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cedula` varchar(100) NOT NULL,
  `tipoDocumento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `idUsuario`, `apellidoPaterno`, `apellidoMaterno`, `primerNombre`, `segundoNombre`, `fechaNacimiento`, `genero`, `telefono`, `email`, `cedula`, `tipoDocumento`) VALUES
(1, 2, 'ROBLEZ', 'VILLANUEVA', 'ROBERTO', 'VANESSA', '2024-01-10', 'masculino', '0989991105', 'pablodariocerezo@gmail.com', '1205487854', 'cedula'),
(2, NULL, 'González', 'Pérez', 'Luis', 'Alberto', '1990-05-15', 'masculino', '1234567890', 'luis.gonzalez@example.com', '1232322323', 'cedula'),
(3, NULL, 'Rodríguez', 'López', 'Ana', 'María', '1985-08-22', 'femenino', '9876543210', 'ana.rodriguez@example.com', '98765432102', 'pasaporte'),
(4, NULL, 'Martínez', 'Hernández', 'Carlos', 'Javier', '1992-03-10', 'masculino', '5555555555', 'carlos.martinez@example.com', '55555555503', 'cedula'),
(5, NULL, 'Gómez', 'Torres', 'Laura', 'Isabel', '1988-11-28', 'femenino', '9999999999', 'laura.gomez@example.com', '323499999999985', 'pasaporte'),
(6, NULL, 'Sánchez', 'Ramírez', 'Diego', 'Alejandro', '1995-09-05', 'masculino', '1112223333', 'diego.sanchez@example.com', '11111111111', 'cedula'),
(7, NULL, 'Fernández', 'García', 'Sofía', 'Beatriz', '1987-04-18', 'femenino', '4445556666', 'sofia.fernandez@example.com', '22222222222', 'pasaporte'),
(8, NULL, 'López', 'Díaz', 'Javier', 'Eduardo', '1993-12-01', 'masculino', '7778889999', 'javier.lopez@example.com', '33333333333', 'cedula'),
(9, NULL, 'Hernández', 'Alvarez', 'Ana', 'Lucia', '1989-06-25', 'femenino', '1239874560', 'ana.hernandez@example.com', '44444444444', 'pasaporte'),
(10, NULL, 'Gutiérrez', 'Mendoza', 'Miguel', 'Ángel', '1998-02-14', 'masculino', '9998887777', 'miguel.gutierrez@example.com', '55555555555', 'cedula'),
(11, NULL, 'Gómez', 'Orozco', 'Catalina', 'María', '1986-07-30', 'femenino', '1112233444', 'catalina.gomez@example.com', '66666666666', 'pasaporte'),
(12, NULL, 'Muñoz', 'Romero', 'Andrés', 'Felipe', '1991-11-12', 'masculino', '5554443333', 'andres.munoz@example.com', '77777777777', 'cedula'),
(13, NULL, 'Vargas', 'Santos', 'Valentina', 'Isabella', '1984-03-24', 'femenino', '9876543210', 'valentina.vargas@example.com', '88888888888', 'pasaporte'),
(14, NULL, 'Jiménez', 'Suárez', 'Juan', 'Pablo', '1996-08-07', 'masculino', '1112223333', 'juan.jimenez@example.com', '99999999999', 'cedula'),
(15, NULL, 'Ortega', 'Cabrera', 'Gabriela', 'Fernanda', '1988-01-17', 'femenino', '4445556666', 'gabriela.ortega@example.com', '23434334343434', 'pasaporte'),
(16, NULL, 'Lara', 'Guerrero', 'Eduardo', 'José', '1994-05-03', 'masculino', '7778889999', 'eduardo.lara@example.com', '1234233543', 'cedula'),
(17, NULL, 'Reyes', 'Castro', 'Camila', 'Alejandra', '1990-09-16', 'femenino', '1239874560', 'camila.reyes@example.com', '345678901235648787', 'pasaporte'),
(18, NULL, 'Molina', 'Rojas', 'Daniel', 'Andrés', '1987-12-08', 'masculino', '9998887777', 'daniel.molina@example.com', '45678901234', 'cedula'),
(19, NULL, 'Castillo', 'Mendoza', 'Isabella', 'Julieta', '1999-02-22', 'femenino', '1112233444', 'isabella.castillo@example.com', '56789012345', 'pasaporte'),
(20, NULL, 'Gómez', 'Vargas', 'José', 'Luis', '1992-06-03', 'masculino', '5554443333', 'jose.gomez@example.com', '67890123456', 'cedula'),
(21, NULL, 'Hernández', 'Muñoz', 'Mariana', 'Gabriela', '1985-10-27', 'femenino', '9876543210', 'mariana.hernandez@example.com', '78901234567', 'pasaporte'),
(22, NULL, 'Santos', 'García', 'Francisco', 'Javier', '1997-03-11', 'masculino', '1112223333', 'francisco.santos@example.com', '89012345678', 'cedula'),
(23, NULL, 'López', 'Gutiérrez', 'Valeria', 'Regina', '1989-07-05', 'femenino', '4445556666', 'valeria.lopez@example.com', '1343343490123456789', 'pasaporte'),
(24, NULL, 'Díaz', 'Molina', 'Alejandro', 'Manuel', '1993-11-19', 'masculino', '7778889999', 'alejandro.diaz@example.com', '1234567890', 'cedula'),
(25, NULL, 'Ortega', 'Cabrera', 'Gabriela', 'Fernanda', '1988-01-17', 'femenino', '4445556666', 'gabriela.ortega@example.com', '12345678901', 'pasaporte'),
(26, NULL, 'Gómez', 'Torres', 'Laura', 'Isabel', '1988-11-28', 'otro', '9999999999', 'laura.gomez@example.com', '232399999999985', 'pasaporte'),
(27, NULL, 'Ramírez', 'Gómez', 'Eduardo', 'Antonio', '1993-06-20', 'masculino', '3332221111', 'eduardo.ramirez@example.com', '12345678910', 'cedula'),
(28, NULL, 'Vega', 'Torres', 'Gabriela', 'Isabel', '1986-09-12', 'femenino', '5556667777', 'gabriela.vega@example.com', '54545645745454', 'pasaporte'),
(29, NULL, 'García', 'Molina', 'Roberto', 'Carlos', '1990-02-08', 'masculino', '1112223333', 'roberto.garcia@example.com', '1234567676', 'cedula'),
(30, NULL, 'Martínez', 'Gutiérrez', 'Luisa', 'María', '1984-04-25', 'femenino', '8889990000', 'luisa.martinez@example.com', '45678901234', 'pasaporte'),
(31, NULL, 'Castro', 'Santos', 'Francisco', 'Javier', '1998-11-01', 'masculino', '4443332222', 'francisco.castro@example.com', '56789012345', 'cedula'),
(32, NULL, 'López', 'Hernández', 'Camila', 'Alejandra', '1989-08-15', 'femenino', '7778889999', 'camila.lopez@example.com', '67890123456', 'pasaporte'),
(33, NULL, 'González', 'Díaz', 'Alejandro', 'Manuel', '1995-03-03', 'masculino', '6665554444', 'alejandro.gonzalez@example.com', '78901234567', 'cedula'),
(34, NULL, 'Ortega', 'Romero', 'Laura', 'Fernanda', '1987-07-18', 'femenino', '9990001111', 'laura.ortega@example.com', '890123443443', 'pasaporte'),
(35, NULL, 'Pérez', 'Muñoz', 'Carlos', 'Andrés', '1992-10-10', 'masculino', '1234567890', 'carlos.perez@example.com', '90123456789', 'cedula'),
(36, NULL, 'Sánchez', 'Lara', 'Isabella', 'Julieta', '1985-12-30', 'femenino', '5554443333', 'isabella.sanchez@example.com', '01234567890', 'pasaporte'),
(37, NULL, 'Díaz', 'Gómez', 'Juan', 'Pablo', '1997-05-22', 'masculino', '4443332222', 'juan.diaz@example.com', '12345678901', 'cedula'),
(38, NULL, 'Molina', 'Castillo', 'Valentina', 'Regina', '1988-02-14', 'femenino', '9998887777', 'valentina.molina@example.com', '23456789012', 'pasaporte'),
(39, NULL, 'Gómez', 'Hernández', 'Miguel', 'Ángel', '1994-09-05', 'masculino', '1112223333', 'miguel.gomez@example.com', '1204545847', 'cedula'),
(40, NULL, 'Torres', 'García', 'Sofía', 'Beatriz', '1990-06-18', 'femenino', '5556667777', 'sofia.torres@example.com', '45678901234', 'pasaporte'),
(41, NULL, 'López', 'Martínez', 'José', 'Luis', '1986-03-09', 'masculino', '8889990000', 'jose.lopez@example.com', '56789012345', 'cedula'),
(42, NULL, 'Hernández', 'Vargas', 'Ana', 'Lucia', '1999-01-04', 'femenino', '4443332222', 'ana.hernandez@example.com', '67890123456', 'pasaporte'),
(43, NULL, 'Castro', 'Santos', 'Andrés', 'Felipe', '1984-08-27', 'masculino', '7778889999', 'andres.castro@example.com', '78901234567', 'cedula'),
(44, NULL, 'López', 'Hernández', 'Camila', 'Alejandra', '1989-08-15', 'femenino', '7778889999', 'camila.lopez@example.com', '89012345678', 'pasaporte'),
(45, NULL, 'González', 'Díaz', 'Alejandro', 'Manuel', '1995-03-03', 'masculino', '6665554444', 'alejandro.gonzalez@example.com', '1243554545', 'cedula'),
(46, NULL, 'Ortega', 'Romero', 'Laura', 'Fernanda', '1987-07-18', 'femenino', '9990001111', 'laura.ortega@example.com', '01234567890', 'pasaporte'),
(47, NULL, 'Pérez', 'Muñoz', 'Carlos', 'Andrés', '1992-10-10', 'masculino', '1234567890', 'carlos.perez@example.com', '12345678901', 'cedula'),
(48, NULL, 'Sánchez', 'Lara', 'Isabella', 'Julieta', '1985-12-30', 'femenino', '5554443333', 'isabella.sanchez@example.com', '234567890124665', 'pasaporte'),
(49, NULL, 'Díaz', 'Gómez', 'Juan', 'Pablo', '1997-05-22', 'masculino', '4443332222', 'juan.diaz@example.com', '1207879454', 'cedula'),
(50, NULL, 'Pérez', 'Gómez', 'María', 'Isabel', '1993-08-12', 'femenino', '1112223333', 'maria.perez@example.com', '11111111112', 'pasaporte'),
(51, NULL, 'García', 'Fernández', 'Javier', 'Andrés', '1990-04-05', 'masculino', '4445556666', 'javier.garcia@example.com', '1234343434', 'cedula'),
(52, NULL, 'Ramírez', 'Lara', 'Camila', 'Alejandra', '1988-11-25', 'femenino', '7778889999', 'camila.ramirez@example.com', '5467676878787', 'pasaporte'),
(53, NULL, 'Díaz', 'Martínez', 'Diego', 'Antonio', '1996-03-18', 'masculino', '1239874560', 'diego.diaz@example.com', '0954564613', 'cedula'),
(54, NULL, 'Suárez', 'López', 'Valentina', 'Sofía', '1991-10-02', 'femenino', '5554443333', 'valentina.suarez@example.com', '55555555556', 'pasaporte'),
(55, NULL, 'Mendoza', 'Santos', 'Daniel', 'Alejandro', '1985-01-14', 'masculino', '9876543210', 'daniel.mendoza@example.com', '66666666667', 'cedula'),
(56, NULL, 'Torres', 'Ortega', 'Isabella', 'Julieta', '1998-06-27', 'femenino', '1112233444', 'isabella.torres@example.com', '12077777777778', 'pasaporte'),
(57, NULL, 'Castro', 'Gutiérrez', 'Francisco', 'José', '1987-09-10', 'masculino', '9998887777', 'francisco.castro@example.com', '88888888889', 'cedula'),
(58, NULL, 'Alvarez', 'Gómez', 'Mariana', 'Gabriela', '1992-02-02', 'femenino', '1239874560', 'mariana.alvarez@example.com', '99999999990', 'pasaporte'),
(59, NULL, 'López', 'Hernández', 'Alejandro', 'Manuel', '1984-07-16', 'masculino', '7778889999', 'alejandro.lopez@example.com', '1205646465', 'cedula'),
(60, NULL, 'Cabrera', 'Reyes', 'Gabriela', 'Fernanda', '1989-12-29', 'femenino', '4445556666', 'gabriela.cabrera@example.com', '32323232323', 'pasaporte'),
(61, NULL, 'Gómez', 'Martínez', 'José', 'Luis', '1995-05-23', 'masculino', '5554443333', 'jose.gomez@example.com', '1234535454', 'cedula'),
(62, NULL, 'Hernández', 'Ortega', 'Valeria', 'Regina', '1986-08-07', 'femenino', '9876543210', 'valeria.hernandez@example.com', '334546456657678', 'pasaporte'),
(63, NULL, 'Muñoz', 'Díaz', 'Andrés', 'Felipe', '1993-01-30', 'masculino', '1112223333', 'andres.munoz@example.com', '1205454545', 'cedula'),
(64, NULL, 'Romero', 'Santos', 'Isabella', 'Julieta', '1988-06-13', 'femenino', '1239874560', 'isabella.romero@example.com', '55555555556', 'pasaporte'),
(65, NULL, 'Vargas', 'García', 'Francisco', 'Javier', '1997-11-06', 'masculino', '9998887777', 'francisco.vargas@example.com', '66666666667', 'cedula'),
(66, NULL, 'López', 'Gómez', 'Valeria', 'Regina', '1985-02-20', 'femenino', '1112233444', 'valeria.lopez@example.com', '7773435477777778', 'pasaporte'),
(67, NULL, 'Molina', 'Ortega', 'Alejandro', 'Manuel', '1991-07-05', 'masculino', '5554443333', 'alejandro.molina@example.com', '88888888889', 'cedula'),
(68, NULL, 'Castillo', 'Hernández', 'Isabella', 'Julieta', '1999-12-19', 'femenino', '9876543210', 'isabella.castillo@example.com', '1434399999999990', 'pasaporte'),
(69, NULL, 'Gómez', 'Santos', 'José', 'Luis', '1992-05-14', 'otro', '5554443333', 'jose.gomez@example.com', '1003232332', 'cedula'),
(70, NULL, 'Hernández', 'Suárez', 'Mariana', 'Gabriela', '1985-10-29', 'femenino', '9876543210', 'mariana.hernandez@example.com', '232323232323232', 'pasaporte'),
(71, NULL, 'Santos', 'Gómez', 'Francisco', 'Javier', '1997-04-12', 'masculino', '1112223333', 'francisco.santos@example.com', '22222222223', 'cedula'),
(72, NULL, 'López', 'Gutiérrez', 'Valeria', 'Regina', '1989-07-05', 'femenino', '4445556666', 'valeria.lopez@example.com', '123323333333334', 'pasaporte'),
(73, NULL, 'Díaz', 'Molina', 'Alejandro', 'Manuel', '1993-11-19', 'masculino', '7778889999', 'alejandro.diaz@example.com', '0944613213', 'cedula'),
(74, NULL, 'Ortega', 'Cabrera', 'Gabriela', 'Fernanda', '1988-01-17', 'femenino', '4445556666', 'gabriela.ortega@example.com', '55555555556', 'pasaporte'),
(75, NULL, 'Gómez', 'Torres', 'Laura', 'Isabel', '1988-11-28', 'otro', '9999999999', 'laura.gomez@example.com', '99999999985', 'pasaporte'),
(76, NULL, 'González', 'Fernández', 'Luis', 'Miguel', '1990-03-18', 'masculino', '1112223333', 'luis.gonzalez@example.com', '2343435654655576', 'pasaporte'),
(77, NULL, 'Rodríguez', 'Santos', 'Ana', 'Gabriela', '1985-06-27', 'femenino', '4445556666', 'ana.rodriguez@example.com', '1243433433', 'cedula'),
(78, NULL, 'Martínez', 'Gómez', 'Carlos', 'Javier', '1992-11-10', 'masculino', '5555555555', 'carlos.martinez@example.com', '33333333336', 'pasaporte'),
(79, NULL, 'Gómez', 'Torres', 'Laura', 'Isabel', '1988-08-03', 'femenino', '1239874560', 'laura.gomez@example.com', '44444444447', 'cedula'),
(80, NULL, 'Sánchez', 'Ramírez', 'Diego', 'Alejandro', '1995-02-15', 'masculino', '7778889999', 'diego.sanchez@example.com', '55555555558', 'pasaporte'),
(81, NULL, 'Fernández', 'García', 'Sofía', 'Beatriz', '1987-09-28', 'femenino', '9876543210', 'sofia.fernandez@example.com', '66666666669', 'cedula'),
(82, NULL, 'López', 'Díaz', 'Javier', 'Eduardo', '1993-04-01', 'masculino', '1112233444', 'javier.lopez@example.com', '77777777770', 'pasaporte'),
(83, NULL, 'Hernández', 'Alvarez', 'Ana', 'Lucia', '1989-10-15', 'femenino', '5554443333', 'ana.hernandez@example.com', '1204554543', 'cedula'),
(84, NULL, 'Gutiérrez', 'Mendoza', 'Miguel', 'Ángel', '1998-05-29', 'masculino', '9998887777', 'miguel.gutierrez@example.com', '99999999992', 'pasaporte'),
(85, NULL, 'Gómez', 'Orozco', 'Catalina', 'María', '1986-12-14', 'femenino', '1112233444', 'catalina.gomez@example.com', '1204545635', 'cedula'),
(86, NULL, 'Muñoz', 'Romero', 'Andrés', 'Felipe', '1991-04-26', 'masculino', '5554443333', 'andres.munoz@example.com', '111141111114', 'pasaporte'),
(87, NULL, 'Vargas', 'Santos', 'Valentina', 'Isabella', '1984-09-09', 'femenino', '9876543210', 'valentina.vargas@example.com', '22222222225', 'cedula'),
(88, NULL, 'Jiménez', 'Suárez', 'Juan', 'Pablo', '1996-02-22', 'masculino', '1112223333', 'juan.jimenez@example.com', '4345465434343', 'pasaporte'),
(89, NULL, 'Ortega', 'Cabrera', 'Gabriela', 'Fernanda', '1988-07-03', 'femenino', '4445556666', 'gabriela.ortega@example.com', '44444444447', 'cedula'),
(90, NULL, 'Lara', 'Guerrero', 'Eduardo', 'José', '1994-12-16', 'masculino', '7778889999', 'eduardo.lara@example.com', '55555555558', 'pasaporte'),
(91, NULL, 'Reyes', 'Castro', 'Camila', 'Alejandra', '1990-03-30', 'femenino', '1239874560', 'camila.reyes@example.com', '66666666669', 'cedula'),
(92, NULL, 'Molina', 'Rojas', 'Daniel', 'Andrés', '1987-08-12', 'masculino', '9998887777', 'daniel.molina@example.com', '77777777770', 'pasaporte'),
(93, NULL, 'Castillo', 'Mendoza', 'Isabella', 'Julieta', '1999-01-24', 'femenino', '1112233444', 'isabella.castillo@example.com', '88888888881', 'cedula'),
(94, NULL, 'Gómez', 'Vargas', 'José', 'Luis', '1992-04-05', 'masculino', '5554443333', 'jose.gomez@example.com', '12299999999992', 'pasaporte'),
(95, NULL, 'Hernández', 'Muñoz', 'Mariana', 'Gabriela', '1985-09-18', 'femenino', '9876543210', 'mariana.hernandez@example.com', '1206545684', 'cedula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `nombreMedicamento` varchar(50) NOT NULL,
  `indicacionesMedicamento` text NOT NULL,
  `idHistoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'admin', 'admin', 'administrador'),
(2, 'dara4', 'dara4', 'paciente'),
(3, 'doctor', 'doctor', 'doctor'),
(4, 'recepcionista', 'recepcionista', 'digitador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `FK_citas_doctores` (`idDoctor`),
  ADD KEY `FK_citas_pacientes` (`idPaciente`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_doctores_especialidades` (`idEspecialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_historias_especialidades` (`idEspecialidad`),
  ADD KEY `FK_historias_pacientes` (`idPaciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pacientes_usuarios` (`idUsuario`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_recetas_historias` (`idHistoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `FK_citas_doctores` FOREIGN KEY (`idDoctor`) REFERENCES `doctores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_citas_pacientes` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `FK_doctores_especialidades` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `FK_historias_especialidades` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_historias_pacientes` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `FK_pacientes_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `FK_recetas_historias` FOREIGN KEY (`idHistoria`) REFERENCES `historias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
