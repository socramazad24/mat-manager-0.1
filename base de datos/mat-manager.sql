-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2024 a las 01:32:59
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
-- Base de datos: `mat-manager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoriamateriales`
--

CREATE TABLE `auditoriamateriales` (
  `idR_material` varchar(10) NOT NULL,
  `idMaterial` varchar(8) NOT NULL,
  `materialName` varchar(15) NOT NULL,
  `description` varchar(30) NOT NULL,
  `costoUnitario` int(10) NOT NULL,
  `cantidadMaterial` int(10) NOT NULL,
  `idProveedor` varchar(15) NOT NULL,
  `Action` varchar(15) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoriamateriales`
--

INSERT INTO `auditoriamateriales` (`idR_material`, `idMaterial`, `materialName`, `description`, `costoUnitario`, `cantidadMaterial`, `idProveedor`, `Action`, `date_reg`) VALUES
('R01876', 'N001', 'cemento', 'cemento secado rapido', 30000, 9, '', 'actualizado', '2023-11-22'),
('R09518', 'N001', 'cemento', 'cemento secado rapido', 30000, 10, 'argo', 'insertado', '2023-11-22'),
('R26097', 'N001', 'cemento', 'cemento secado rapido', 30000, 9, 'argo', 'actualizado', '2023-11-22'),
('R32745', 'N001', 'cemento', 'cemento secado rapido', 30000, 15, 'argo', 'actualizado', '2023-11-22'),
('R98428', 'N001', 'cemento', 'cemento secado rapido', 30000, 15, 'argo', 'actualizado', '2023-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialpedidos`
--

CREATE TABLE `historialpedidos` (
  `idRegPedido` varchar(10) NOT NULL,
  `idPedido` varchar(10) NOT NULL,
  `nameidProveedor` varchar(20) NOT NULL,
  `material` varchar(30) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precioUnitario` int(10) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialpedidos`
--

INSERT INTO `historialpedidos` (`idRegPedido`, `idPedido`, `nameidProveedor`, `material`, `cantidad`, `precioUnitario`, `accion`, `date_reg`) VALUES
('RP14851', 'P005 ', 'megamex', 'cobre', 100, 100000, 'agredado', '2024-05-02'),
('RP65029', 'P004 ', 'argo', 'CEMENTO', 30, 30000, 'eliminado', '2023-11-22'),
('RP95088', 'P002 ', 'cobre', 'cobre conductor', 10, 5000, 'eliminado', '2023-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialproveedores`
--

CREATE TABLE `historialproveedores` (
  `idRegProveedor` varchar(10) NOT NULL,
  `idProveedor` varchar(10) NOT NULL,
  `nameProveedor` varchar(30) NOT NULL,
  `materiales` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialproveedores`
--

INSERT INTO `historialproveedores` (`idRegProveedor`, `idProveedor`, `nameProveedor`, `materiales`, `telefono`, `correo`, `direccion`, `accion`, `date_reg`) VALUES
('0', 'PR0011', 'metro', 'cemento', '3231411', 'argox@argox.com', 'mareigua', 'agregado', '2024-05-07'),
('R43821', 'PR008', 'ceramica', 'cemento', '3231411', 'argox@argox.com', 'mareigua', 'eliminado', '2024-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialusers`
--

CREATE TABLE `historialusers` (
  `idRegUser` varchar(10) NOT NULL,
  `idEmployee` varchar(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialusers`
--

INSERT INTO `historialusers` (`idRegUser`, `idEmployee`, `firstName`, `lastName`, `username`, `password`, `email`, `phone`, `role`, `accion`, `date_reg`) VALUES
('R33172', '1198', 'silva', 'silba', 'silva', '2401', 'silva@silva.com', 12345, 'bodeguero', 'agregado', '2024-05-02'),
('R50976', '11930400', 'checo', 'sanche', 'checo', '2401', 'checo@checo.com', 12345, 'gerente', 'agregado', '2024-05-02'),
('R74717', '11930400', 'checo', 'sanche', 'checo', '2401', 'checo@checo.com', 12345, 'bodeguero', 'actualizado', '2024-05-07'),
('R74922', '1198', 'silva', 'silba', 'silva', '2401', 'silva@silva.com', 12345, 'bodeguero', 'agregado', '2024-05-02'),
('R78996', '11930400', 'checo', 'sanche', 'checo', '2401', 'marcosdp242@gmail.com', 12345, 'gerente', 'agregado', '2024-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `idMaterial` varchar(8) NOT NULL,
  `MaterialName` varchar(15) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `costoUnitario` int(10) NOT NULL,
  `cantidadMaterial` int(10) NOT NULL,
  `idProveedor` varchar(15) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`idMaterial`, `MaterialName`, `Description`, `costoUnitario`, `cantidadMaterial`, `idProveedor`, `date_reg`) VALUES
('N001', 'cemento', 'cemento secado rapido', 30000, 15, 'argo', '2023-11-22');

--
-- Disparadores `materiales`
--
DELIMITER $$
CREATE TRIGGER `TR_REG_MATERIALS` AFTER INSERT ON `materiales` FOR EACH ROW INSERT INTO `auditoriamateriales`(`idR_material`, `idMaterial`, `materialName`, `description`, `costoUnitario`, `cantidadMaterial`, `idProveedor`,`action`, `date_reg`)
 VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idMaterial,NEW.materialName,NEW.description,NEW.costoUnitario,NEW.cantidadMaterial,NEW.idProveedor,'insertado',NEW.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_MATERIALS_Delete` BEFORE DELETE ON `materiales` FOR EACH ROW INSERT INTO `auditoriamateriales`(`idR_material`, `idMaterial`, `materialName`, `description`, `costoUnitario`, `cantidadMaterial`, `idProveedor`,`action`, `date_reg`)
 VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),OLD.idMaterial,OLD.materialName,OLD.description,OLD.costoUnitario,OLD.cantidadMaterial,OLD.idProveedor,'eliminado',OLD.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_MATERIALS_UPDATE` BEFORE UPDATE ON `materiales` FOR EACH ROW INSERT INTO `auditoriamateriales`(`idR_material`, `idMaterial`, `materialName`, `description`, `costoUnitario`, `cantidadMaterial`, `idProveedor`,`action`, `date_reg`)
 VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idMaterial,NEW.materialName,NEW.description,NEW.costoUnitario,NEW.cantidadMaterial,NEW.idProveedor,'actualizado',NEW.date_reg)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` varchar(10) NOT NULL,
  `nameProveedor` varchar(20) NOT NULL,
  `materiales` varchar(50) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `costoUnitario` int(10) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `nameProveedor`, `materiales`, `cantidad`, `costoUnitario`, `fecha_reg`) VALUES
('P001 ', 'argo', 'cemento', 20, 30000, '2023-11-22'),
('P003 ', 'megamex', 'pegamento extra fuerte', 30, 20000, '2023-11-22'),
('P005 ', 'megamex', 'cobre', 100, 100000, '2024-05-02');

--
-- Disparadores `pedidos`
--
DELIMITER $$
CREATE TRIGGER `TR_REG_PEDIDOS_DELETE` BEFORE DELETE ON `pedidos` FOR EACH ROW INSERT INTO `historialpedidos`(`idRegPedido`, `idPedido`, `nameidProveedor`, `material`, `cantidad`, `precioUnitario`,`accion`, `date_reg`) VALUES (CONCAT('RP', LPAD(FLOOR(RAND() * 100000), 5, '0')),OLD.idPedido,OLD.nameProveedor,OLD.materiales,OLD.cantidad,OLD.costoUnitario,'eliminado',OLD.fecha_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_PEDIDOS_INSERT` AFTER INSERT ON `pedidos` FOR EACH ROW INSERT INTO `historialpedidos`(`idRegPedido`, `idPedido`, `nameidProveedor`, `material`, `cantidad`, `precioUnitario`,`accion`, `date_reg`) VALUES (CONCAT('RP', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idPedido,NEW.nameProveedor,NEW.materiales,NEW.cantidad,NEW.costoUnitario,'agredado',NEW.fecha_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_PEDIDOS_UPDATE` BEFORE UPDATE ON `pedidos` FOR EACH ROW INSERT INTO `historialpedidos`(`idRegPedido`, `idPedido`, `nameidProveedor`, `material`, `cantidad`, `precioUnitario`,`accion`, `date_reg`) VALUES (CONCAT('RP', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idPedido,NEW.nameProveedor,NEW.materiales,NEW.cantidad,NEW.costoUnitario,'actualizado',EW.fecha_reg)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idProveedores`
--

CREATE TABLE `idProveedores` (
  `idProveedor` varchar(10) NOT NULL,
  `nameProveedor` varchar(20) NOT NULL,
  `materiales` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `idProveedores`
--

INSERT INTO `idProveedores` (`idProveedor`, `nameProveedor`, `materiales`, `telefono`, `correo`, `direccion`, `date_reg`) VALUES
('PR001', 'argox', 'cemento', 32314, 'argox@argox.com', 'mareigua', '2024-05-01'),
('PR0011', 'metro', 'cemento', 3231411, 'argox@argox.com', 'mareigua', '2024-05-07'),
('PR002', 'metro', 'cobre', 3231411, 'metro@metro.com', 'la paz', '2024-05-01'),
('PR003', 'matro', 'hierro', 3231411, 'metro@metro.com', 'la paz', '2024-05-01');

--
-- Disparadores `idProveedores`
--
DELIMITER $$
CREATE TRIGGER `RG_DELETE_PROVEEDOR` BEFORE DELETE ON `idProveedores` FOR EACH ROW INSERT INTO `historialproveedores`(`idRegProveedor`, `idProveedor`, `nameProveedor`, `materiales`, `telefono`, `correo`, `direccion`, `accion`, `date_reg`) 
VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),OLD.idProveedor,OLD.nameProveedor,OLD.materiales,OLD.telefono,OLD.correo,OLD.direccion,'eliminado',OLD.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RG_REGISTRO_PROVEEDOR` AFTER INSERT ON `idProveedores` FOR EACH ROW INSERT INTO `historialproveedores`(`idRegProveedor`, `idProveedor`, `nameProveedor`, `materiales`, `telefono`, `correo`, `direccion`, `accion`, `date_reg`) 
VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idProveedor,NEW.nameProveedor,NEW.materiales,NEW.telefono,NEW.correo,NEW.direccion,'agregado',NEW.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `RG_UPDATE_PROVEEDOR` BEFORE UPDATE ON `idProveedores` FOR EACH ROW INSERT INTO `historialproveedores`(`idRegProveedor`, `idProveedor`, `nameProveedor`, `materiales`, `telefono`, `correo`, `direccion`, `accion`, `date_reg`) 
VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idProveedor,NEW.nameProveedor,NEW.materiales,NEW.telefono,NEW.correo,NEW.direccion,'actualizado',NEW.date_reg)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idEmployee` varchar(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idEmployee`, `firstName`, `lastName`, `username`, `password`, `email`, `phone`, `role`, `date_reg`) VALUES
('1193', 'marcos', 'daza', 'marcos', '2401', 'marcosdp@gmail.com', 324564, 'administrador', '2023-11-22'),
('11930400', 'checo', 'sanche', 'checo', '2401', 'checo@checo.com', 12345, 'bodeguero', '2024-05-07'),
('1195', 'sialem', 'smith', 'ssayko', '2401', 'kanbdska@gmail.com', 2465464, 'gerente', '2023-11-22'),
('1196', 'pepi', 'perez', 'pepin', '2401', 'chechales@hola.com', 465456, 'bodeguero', '2023-11-22');

--
-- Disparadores `users`
--
DELIMITER $$
CREATE TRIGGER `TR_REG_USERS_DELETE` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO `historialusers`(`idRegUser`, `idEmployee`, `firstName`, `lastName`, `username`, `password`, `email`, `phone`, `role`, `accion`, `date_reg`) VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),old.idEmployee,old.firstName,old.lastName,old.username,old.password,old.email,old.phone,old.role,'eliminado',old.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_USERS_INSERT` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO `historialusers`(`idRegUser`, `idEmployee`, `firstName`, `lastName`, `username`, `password`, `email`, `phone`, `role`, `accion`, `date_reg`) VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idEmployee,NEW.firstName,NEW.lastName,NEW.username,NEW.password,NEW.email,NEW.phone,NEW.role,'agregado',NEW.date_reg)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_REG_USERS_UPDATE` BEFORE UPDATE ON `users` FOR EACH ROW INSERT INTO `historialusers`(`idRegUser`, `idEmployee`, `firstName`, `lastName`, `username`, `password`, `email`, `phone`, `role`, `accion`, `date_reg`) VALUES (CONCAT('R', LPAD(FLOOR(RAND() * 100000), 5, '0')),NEW.idEmployee,NEW.firstName,NEW.lastName,NEW.username,NEW.password,NEW.email,NEW.phone,NEW.role,'actualizado',NEW.date_reg)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoriamateriales`
--
ALTER TABLE `auditoriamateriales`
  ADD PRIMARY KEY (`idR_material`);

--
-- Indices de la tabla `historialpedidos`
--
ALTER TABLE `historialpedidos`
  ADD PRIMARY KEY (`idRegPedido`);

--
-- Indices de la tabla `historialusers`
--
ALTER TABLE `historialusers`
  ADD PRIMARY KEY (`idRegUser`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `idProveedores`
--
ALTER TABLE `idProveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idEmployee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
