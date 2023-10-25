-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 25-10-2023 a les 17:57:29
-- Versió del servidor: 10.4.28-MariaDB
-- Versió de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre_categoria`) VALUES
(1, 'Pequeños'),
(5, 'Hamburguesas'),
(9, 'Hamburguesas'),
(10, 'Pequeños');

-- --------------------------------------------------------

--
-- Estructura de la taula `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio_unidad` double NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`) VALUES
(1, 'Fingers de queso Mozzarella', 'descripcion', 5.5, 1),
(2, 'Hamburguesa de queso cheddar', 'descripcion', 9, 5),
(3, 'Hamburguesa crispy chicken', 'descripcion', 11.99, 5),
(4, 'Nachos con guacamole', 'descripcion', 7.99, 1),
(5, 'Alitas de pollo', 'descripcion', 7.5, 1);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índexs per a la taula `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índexs per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índexs per a la taula `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `pedido_id` (`pedido_id`,`producto_id`),
  ADD KEY `fk4` (`producto_id`);

--
-- Índexs per a la taula `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`);

--
-- Restriccions per a la taula `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Restriccions per a la taula `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
