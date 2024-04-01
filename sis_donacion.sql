-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2024 a las 18:04:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_donacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `persona_id`, `cargo`, `fecha_inicio`) VALUES
(1, 1, 'Gerente', '2020-01-01'),
(2, 1, 'Supervisor', '2021-05-10'),
(3, 1, 'Coordinador', '2022-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id_alimento` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `grupo_alimenticio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id_alimento`, `nombre`, `descripcion`, `categoria`, `fecha_vencimiento`, `grupo_alimenticio`) VALUES
(1, 'Galletas', 'Dulces y crujientes', 'Snack', '2023-11-30', 'Dulces'),
(2, 'Leche en polvo', 'Nutrición para todas las edades', 'Empaque', '2023-10-31', 'Lácteos'),
(3, 'Cereal', 'Desayuno saludable', 'Caja', '2023-09-30', 'Cereales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autenticacion`
--

CREATE TABLE `autenticacion` (
  `id_autenticacion` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `organizacion_id` int(11) DEFAULT NULL,
  `tipo_persona` enum('ADMINISTRADOR','VOLUNTARIO','ORGANIZACION') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autenticacion`
--

INSERT INTO `autenticacion` (`id_autenticacion`, `usuario`, `contrasena`, `persona_id`, `organizacion_id`, `tipo_persona`) VALUES
(1, 'admin', 'admin', 1, NULL, 'ADMINISTRADOR'),
(2, 'vol', 'vol', 2, NULL, 'VOLUNTARIO'),
(3, 'carlos', 'carlos', NULL, 1, 'VOLUNTARIO'),
(5, 'lucas', 'lucas', 5, NULL, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casual`
--

CREATE TABLE `casual` (
  `id_casual` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `fecha_visita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casual`
--

INSERT INTO `casual` (`id_casual`, `persona_id`, `fecha_visita`) VALUES
(1, 3, '2023-02-10'),
(2, 3, '2023-03-15'),
(3, 3, '2023-04-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_alimento`
--

CREATE TABLE `entrega_alimento` (
  `entrega_id` int(11) DEFAULT NULL,
  `alimento_id` int(11) DEFAULT NULL,
  `cantidad_entregada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega_alimento`
--

INSERT INTO `entrega_alimento` (`entrega_id`, `alimento_id`, `cantidad_entregada`) VALUES
(1, 1, 25),
(2, 2, 10),
(3, 3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_donaciones`
--

CREATE TABLE `entrega_donaciones` (
  `id_entrega` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `cantidad_entregada` int(11) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `responsable_entrega_id` int(11) DEFAULT NULL,
  `responsable_recepcion_entrega_id` int(11) DEFAULT NULL,
  `org_receptora_id` int(11) DEFAULT NULL,
  `estado_entrega` enum('PENDIENTE','COMPLETADA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega_donaciones`
--

INSERT INTO `entrega_donaciones` (`id_entrega`, `fecha_entrega`, `cantidad_entregada`, `observacion`, `responsable_entrega_id`, `responsable_recepcion_entrega_id`, `org_receptora_id`, `estado_entrega`) VALUES
(1, '2023-01-10', 90, 'Entrega inicial', 2, 1, NULL, 'COMPLETADA'),
(2, '2023-02-20', 40, 'Entrega mensual', 2, 1, 2, 'PENDIENTE'),
(3, '2023-03-25', 70, 'Entrega especial', 2, 2, 1, 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_producto`
--

CREATE TABLE `entrega_producto` (
  `entrega_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad_entregada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega_producto`
--

INSERT INTO `entrega_producto` (`entrega_id`, `producto_id`, `cantidad_entregada`) VALUES
(1, 1, 45),
(2, 2, 20),
(3, 3, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nombre`, `descripcion`, `url`, `icono`) VALUES
(1, 'Usuarios', 'Gestión de usuarios y roles', '/usuarios', 'icono-usuarios'),
(2, 'Reportes', 'Visualización de informes', '/reportes', 'icono-reportes'),
(3, 'Configuración', 'Ajustes del sistema', '/configuracion', 'icono-configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_permiso`
--

CREATE TABLE `modulo_permiso` (
  `modulo_id` int(11) DEFAULT NULL,
  `permiso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo_permiso`
--

INSERT INTO `modulo_permiso` (`modulo_id`, `permiso_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `id_organizacion` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo_organizacion` enum('ORG_BENEFICA','ORG_RECEPTORA') NOT NULL,
  `pagina_web` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `persona_contacto` varchar(255) DEFAULT NULL,
  `telefono_contacto` varchar(20) DEFAULT NULL,
  `email_contacto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`id_organizacion`, `nombre`, `descripcion`, `tipo_organizacion`, `pagina_web`, `ubicacion`, `persona_contacto`, `telefono_contacto`, `email_contacto`) VALUES
(1, 'Fundación A', 'Organización benéfica', 'ORG_BENEFICA', 'www.fundacionA.org', 'Ciudad X', 'Laura', '987654321', 'info@fundacionA.org'),
(2, 'Centro de Recursos', 'Organización receptora', 'ORG_RECEPTORA', 'www.centrorecursos.org', 'Ciudad Y', 'Javier', '123456789', 'info@centrorecursos.org');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `org_benefica`
--

CREATE TABLE `org_benefica` (
  `id_org_benefica` int(11) NOT NULL,
  `objetivo_benefico` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `org_benefica`
--

INSERT INTO `org_benefica` (`id_org_benefica`, `objetivo_benefico`) VALUES
(1, 'Apoyar a comunidades en situación de vulnerabilidad'),
(2, 'Brindar recursos a personas necesitadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `org_receptora`
--

CREATE TABLE `org_receptora` (
  `id_org_receptora` int(11) NOT NULL,
  `necesidades_donacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `org_receptora`
--

INSERT INTO `org_receptora` (`id_org_receptora`, `necesidades_donacion`) VALUES
(1, 'Material escolar, juguetes y productos de limpieza'),
(2, 'Alimentos no perecederos, ropa y artículos de higiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ver` tinyint(1) NOT NULL,
  `escribir` tinyint(1) NOT NULL,
  `modificar` tinyint(1) NOT NULL,
  `agregar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `descripcion`, `ver`, `escribir`, `modificar`, `agregar`) VALUES
(1, 'Administrar usuarios', 1, 1, 1, 1),
(2, 'Ver reportes', 1, 0, 0, 0),
(3, 'Modificar configuración', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_persona` enum('CASUAL','VOLUNTARIO','ADMINISTRADOR') NOT NULL,
  `foto` blob DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `ci`, `correo`, `telefono`, `direccion`, `fecha_nacimiento`, `tipo_persona`, `foto`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Erick', 'Perez', '123456789', 'juan@gmail.com', '1234567890', 'Calle A #123', '1990-01-15', 'ADMINISTRADOR', '', '2024-03-07 00:57:54', '2024-03-11 00:59:38'),
(2, 'Ana', 'Gomez', '987654321', 'ana@gmail.com', '9876543210', 'Calle B #456', '1985-05-20', 'VOLUNTARIO', NULL, '2024-03-07 00:57:54', '2024-03-07 00:57:54'),
(3, 'Carlos', 'Lopez', '456789012', 'carlos@gmail.com', '4567890123', 'Calle C #789', '2000-08-10', 'VOLUNTARIO', '', '2024-03-07 00:57:54', '2024-03-11 03:24:29'),
(5, 'lucas', 'fernandes', '681798', 'lucas@mail.com', '1976864', 'calle luna #2123', '2024-02-26', 'ADMINISTRADOR', 0x42442e76322d4445522e706e67, '2024-03-10 22:45:52', '2024-03-10 22:45:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_modulo`
--

CREATE TABLE `persona_modulo` (
  `persona_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_modulo`
--

INSERT INTO `persona_modulo` (`persona_id`, `modulo_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_recepcion_donacion`
--

CREATE TABLE `persona_recepcion_donacion` (
  `persona_id` int(11) DEFAULT NULL,
  `recepcion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona_recepcion_donacion`
--

INSERT INTO `persona_recepcion_donacion` (`persona_id`, `recepcion_id`) VALUES
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `unidad_medida`, `categoria`, `marca`, `fecha_vencimiento`) VALUES
(1, 'Libretas', 'Cuadernos para escribir', 'Unidad', 'Escolar', 'Marca A', '2024-12-31'),
(2, 'Arroz', 'Grano básico de alimentación', 'Kilogramo', 'No perecedero', 'Marca B', '2023-08-31'),
(3, 'Juguetes', 'Para niños de todas las edades', 'Unidad', 'Juguetería', 'Marca C', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_alimento`
--

CREATE TABLE `recepcion_alimento` (
  `recepcion_id` int(11) DEFAULT NULL,
  `alimento_id` int(11) DEFAULT NULL,
  `cantidad_recibida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcion_alimento`
--

INSERT INTO `recepcion_alimento` (`recepcion_id`, `alimento_id`, `cantidad_recibida`) VALUES
(1, 1, 30),
(2, 2, 15),
(3, 3, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_donaciones`
--

CREATE TABLE `recepcion_donaciones` (
  `id_recepcion` int(11) NOT NULL,
  `fecha_recepcion` date DEFAULT NULL,
  `cantidad_total` int(11) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `persona_realiza_id` int(11) DEFAULT NULL,
  `responsable_r_id` int(11) DEFAULT NULL,
  `organizacion_realiza_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcion_donaciones`
--

INSERT INTO `recepcion_donaciones` (`id_recepcion`, `fecha_recepcion`, `cantidad_total`, `observacion`, `persona_realiza_id`, `responsable_r_id`, `organizacion_realiza_id`) VALUES
(1, '2023-01-05', 100, 'Donación inicial', 3, 1, NULL),
(2, '2023-02-15', 50, 'Donación mensual', 3, 1, 1),
(3, '2023-03-20', 80, 'Donación especial', 3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_producto`
--

CREATE TABLE `recepcion_producto` (
  `recepcion_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad_recibida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcion_producto`
--

INSERT INTO `recepcion_producto` (`recepcion_id`, `producto_id`, `cantidad_recibida`) VALUES
(1, 1, 50),
(2, 2, 25),
(3, 3, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

CREATE TABLE `voluntario` (
  `id_voluntario` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`id_voluntario`, `fecha_ingreso`, `persona_id`) VALUES
(1, '2022-07-01', 2),
(2, '2022-09-15', 2),
(3, '2022-11-20', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario_entrega_donacion`
--

CREATE TABLE `voluntario_entrega_donacion` (
  `voluntario_id` int(11) DEFAULT NULL,
  `entrega_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `voluntario_entrega_donacion`
--

INSERT INTO `voluntario_entrega_donacion` (`voluntario_id`, `entrega_id`) VALUES
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario_recepcion_donacion`
--

CREATE TABLE `voluntario_recepcion_donacion` (
  `voluntario_id` int(11) DEFAULT NULL,
  `recepcion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `voluntario_recepcion_donacion`
--

INSERT INTO `voluntario_recepcion_donacion` (`voluntario_id`, `recepcion_id`) VALUES
(2, 1),
(2, 2),
(2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id_alimento`);

--
-- Indices de la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  ADD PRIMARY KEY (`id_autenticacion`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `organizacion_id` (`organizacion_id`);

--
-- Indices de la tabla `casual`
--
ALTER TABLE `casual`
  ADD PRIMARY KEY (`id_casual`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `entrega_alimento`
--
ALTER TABLE `entrega_alimento`
  ADD KEY `entrega_id` (`entrega_id`),
  ADD KEY `alimento_id` (`alimento_id`);

--
-- Indices de la tabla `entrega_donaciones`
--
ALTER TABLE `entrega_donaciones`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `responsable_entrega_id` (`responsable_entrega_id`),
  ADD KEY `responsable_recepcion_entrega_id` (`responsable_recepcion_entrega_id`),
  ADD KEY `org_receptora_id` (`org_receptora_id`);

--
-- Indices de la tabla `entrega_producto`
--
ALTER TABLE `entrega_producto`
  ADD KEY `entrega_id` (`entrega_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `modulo_permiso`
--
ALTER TABLE `modulo_permiso`
  ADD KEY `modulo_id` (`modulo_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`id_organizacion`);

--
-- Indices de la tabla `org_benefica`
--
ALTER TABLE `org_benefica`
  ADD PRIMARY KEY (`id_org_benefica`);

--
-- Indices de la tabla `org_receptora`
--
ALTER TABLE `org_receptora`
  ADD PRIMARY KEY (`id_org_receptora`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `persona_modulo`
--
ALTER TABLE `persona_modulo`
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- Indices de la tabla `persona_recepcion_donacion`
--
ALTER TABLE `persona_recepcion_donacion`
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `recepcion_id` (`recepcion_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `recepcion_alimento`
--
ALTER TABLE `recepcion_alimento`
  ADD KEY `recepcion_id` (`recepcion_id`),
  ADD KEY `alimento_id` (`alimento_id`);

--
-- Indices de la tabla `recepcion_donaciones`
--
ALTER TABLE `recepcion_donaciones`
  ADD PRIMARY KEY (`id_recepcion`),
  ADD KEY `persona_realiza_id` (`persona_realiza_id`),
  ADD KEY `responsable_r_id` (`responsable_r_id`),
  ADD KEY `organizacion_realiza_id` (`organizacion_realiza_id`);

--
-- Indices de la tabla `recepcion_producto`
--
ALTER TABLE `recepcion_producto`
  ADD KEY `recepcion_id` (`recepcion_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD PRIMARY KEY (`id_voluntario`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `voluntario_entrega_donacion`
--
ALTER TABLE `voluntario_entrega_donacion`
  ADD KEY `voluntario_id` (`voluntario_id`),
  ADD KEY `entrega_id` (`entrega_id`);

--
-- Indices de la tabla `voluntario_recepcion_donacion`
--
ALTER TABLE `voluntario_recepcion_donacion`
  ADD KEY `voluntario_id` (`voluntario_id`),
  ADD KEY `recepcion_id` (`recepcion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  MODIFY `id_autenticacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `casual`
--
ALTER TABLE `casual`
  MODIFY `id_casual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrega_donaciones`
--
ALTER TABLE `entrega_donaciones`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `id_organizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recepcion_donaciones`
--
ALTER TABLE `recepcion_donaciones`
  MODIFY `id_recepcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  MODIFY `id_voluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `autenticacion`
--
ALTER TABLE `autenticacion`
  ADD CONSTRAINT `autenticacion_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `autenticacion_ibfk_2` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacion` (`id_organizacion`);

--
-- Filtros para la tabla `casual`
--
ALTER TABLE `casual`
  ADD CONSTRAINT `casual_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `entrega_alimento`
--
ALTER TABLE `entrega_alimento`
  ADD CONSTRAINT `entrega_alimento_ibfk_1` FOREIGN KEY (`entrega_id`) REFERENCES `entrega_donaciones` (`id_entrega`),
  ADD CONSTRAINT `entrega_alimento_ibfk_2` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos` (`id_alimento`);

--
-- Filtros para la tabla `entrega_donaciones`
--
ALTER TABLE `entrega_donaciones`
  ADD CONSTRAINT `entrega_donaciones_ibfk_1` FOREIGN KEY (`responsable_entrega_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `entrega_donaciones_ibfk_2` FOREIGN KEY (`responsable_recepcion_entrega_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `entrega_donaciones_ibfk_3` FOREIGN KEY (`org_receptora_id`) REFERENCES `org_receptora` (`id_org_receptora`);

--
-- Filtros para la tabla `entrega_producto`
--
ALTER TABLE `entrega_producto`
  ADD CONSTRAINT `entrega_producto_ibfk_1` FOREIGN KEY (`entrega_id`) REFERENCES `entrega_donaciones` (`id_entrega`),
  ADD CONSTRAINT `entrega_producto_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `modulo_permiso`
--
ALTER TABLE `modulo_permiso`
  ADD CONSTRAINT `modulo_permiso_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id_modulo`),
  ADD CONSTRAINT `modulo_permiso_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id_permiso`);

--
-- Filtros para la tabla `org_benefica`
--
ALTER TABLE `org_benefica`
  ADD CONSTRAINT `org_benefica_ibfk_1` FOREIGN KEY (`id_org_benefica`) REFERENCES `organizacion` (`id_organizacion`);

--
-- Filtros para la tabla `org_receptora`
--
ALTER TABLE `org_receptora`
  ADD CONSTRAINT `org_receptora_ibfk_1` FOREIGN KEY (`id_org_receptora`) REFERENCES `organizacion` (`id_organizacion`);

--
-- Filtros para la tabla `persona_modulo`
--
ALTER TABLE `persona_modulo`
  ADD CONSTRAINT `persona_modulo_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `persona_modulo_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id_modulo`);

--
-- Filtros para la tabla `persona_recepcion_donacion`
--
ALTER TABLE `persona_recepcion_donacion`
  ADD CONSTRAINT `persona_recepcion_donacion_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `persona_recepcion_donacion_ibfk_2` FOREIGN KEY (`recepcion_id`) REFERENCES `recepcion_donaciones` (`id_recepcion`);

--
-- Filtros para la tabla `recepcion_alimento`
--
ALTER TABLE `recepcion_alimento`
  ADD CONSTRAINT `recepcion_alimento_ibfk_1` FOREIGN KEY (`recepcion_id`) REFERENCES `recepcion_donaciones` (`id_recepcion`),
  ADD CONSTRAINT `recepcion_alimento_ibfk_2` FOREIGN KEY (`alimento_id`) REFERENCES `alimentos` (`id_alimento`);

--
-- Filtros para la tabla `recepcion_donaciones`
--
ALTER TABLE `recepcion_donaciones`
  ADD CONSTRAINT `recepcion_donaciones_ibfk_1` FOREIGN KEY (`persona_realiza_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `recepcion_donaciones_ibfk_2` FOREIGN KEY (`responsable_r_id`) REFERENCES `persona` (`id_persona`),
  ADD CONSTRAINT `recepcion_donaciones_ibfk_3` FOREIGN KEY (`organizacion_realiza_id`) REFERENCES `org_benefica` (`id_org_benefica`);

--
-- Filtros para la tabla `recepcion_producto`
--
ALTER TABLE `recepcion_producto`
  ADD CONSTRAINT `recepcion_producto_ibfk_1` FOREIGN KEY (`recepcion_id`) REFERENCES `recepcion_donaciones` (`id_recepcion`),
  ADD CONSTRAINT `recepcion_producto_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `voluntario_entrega_donacion`
--
ALTER TABLE `voluntario_entrega_donacion`
  ADD CONSTRAINT `voluntario_entrega_donacion_ibfk_1` FOREIGN KEY (`voluntario_id`) REFERENCES `voluntario` (`id_voluntario`),
  ADD CONSTRAINT `voluntario_entrega_donacion_ibfk_2` FOREIGN KEY (`entrega_id`) REFERENCES `entrega_donaciones` (`id_entrega`);

--
-- Filtros para la tabla `voluntario_recepcion_donacion`
--
ALTER TABLE `voluntario_recepcion_donacion`
  ADD CONSTRAINT `voluntario_recepcion_donacion_ibfk_1` FOREIGN KEY (`voluntario_id`) REFERENCES `voluntario` (`id_voluntario`),
  ADD CONSTRAINT `voluntario_recepcion_donacion_ibfk_2` FOREIGN KEY (`recepcion_id`) REFERENCES `recepcion_donaciones` (`id_recepcion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
