-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 21-11-2023 a les 19:36:31
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
(1, 'Complementos'),
(2, 'Postres'),
(3, 'Bebidas'),
(4, 'Destacados'),
(5, 'Hamburguesas');

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
  `categoria_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`, `img`) VALUES
(1, 'Fingers de queso Mozzarella', 'descripcion', 5.5, 1, 'https://gps.burgerkingencasa.es/images/products/1637070524080_donuts_goudax8.png'),
(2, 'Hamburguesa de queso cheddar', 'descripcion', 9, 5, 'https://gps.burgerkingencasa.es/images/products/1697713438134_HOMERIA-BRUTAL-BACON-CRISPY-1-PATTY-NUEVO.png'),
(3, 'Hamburguesa crispy chicken', 'descripcion', 11.99, 5, 'https://gps.burgerkingencasa.es/images/products/1660736572217_crispy-chicken-new.png'),
(5, 'Alitas de pollo', 'descripcion', 7.5, 1, 'https://gps.burgerkingencasa.es/images/products/1667459875822_Homeria_Alitas_6UDS_600X411.png'),
(19, 'Brutal Bacon (2 Carnes)', 'descripción', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1667472596663_BRUTAL-BACON_2carnes.png'),
(20, 'Brutal Bacon (1 Carne)', 'descripción', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1667472538034_BRUTAL-BACON_1carne.png'),
(21, 'Brutal Bacon Crispy Chicken', 'descripción', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1697713438134_HOMERIA-BRUTAL-BACON-CRISPY-1-PATTY-NUEVO.png'),
(22, 'Brutal Bacon Doble Crispy Chicken', 'descripción', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1667472396703_BRUTAL-BACON_pollo.png'),
(23, 'CBK Doble', 'descripción', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693829714306_homeria_MB_CBK.png'),
(24, 'CBK', 'descripcion', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693829825827_homeria_CCB_sin_semillas_copia.png'),
(25, 'Duo Bacon Cheddar (2 Carnes)', 'descripcion', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693909322303_homeria_duo-bacon-cheddar-menu_doble-carne_SS.png'),
(26, 'Duo Bacon Cheddar (1 Carne)', 'descripcion', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693909356532_homeria_duo-bacon-cheddar-menu_carne_SS.png'),
(27, 'Duo Bacon Cheddar - Doble Crispy Chicken', 'descripcion', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693909391714_homeria_duo-bacon-cheddar-menu_crispy_SS.png'),
(28, 'Angus Grill (2 Carnes)', 'descripcion', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1693830049665_angus_SS_2c.png'),
(29, 'Chicken Nuggets', 'descripcion', 10, 1, 'https://gps.burgerkingencasa.es/images/products/1697203591617_nuggets_x6.png'),
(30, 'Patatas Clásicas', 'descripcion', 10, 1, 'https://gps.burgerkingencasa.es/images/products/1515751854847_Supreme_Sour.png'),
(31, 'Chili Cheese Bites', 'descripcion', 10, 1, 'https://gps.burgerkingencasa.es/images/products/1660726160893_Chili-Cheese-Bites-x9-new.png'),
(32, 'Aros de Cebolla', 'descripcion', 10, 1, 'https://gps.burgerkingencasa.es/images/products/1660727204063_AROS-DE-CEBOLLA-x10-NEW.png'),
(33, 'Nuggets vegetales', 'descripcion', 10, 1, 'https://gps.burgerkingencasa.es/images/products/1675841765115_bodegones-app-600x411_4_nuggets-vegetales.png');

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
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
