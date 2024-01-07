-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2024 a las 19:39:32
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
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre_categoria`) VALUES
(1, 'Complementos'),
(2, 'Postres'),
(3, 'Bebidas'),
(5, 'Hamburguesas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `estado`, `fecha_pedido`, `cliente_id`) VALUES
(228, 'Pendiente', '2024-01-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pedido_productos`
--

INSERT INTO `pedido_productos` (`pedido_id`, `producto_id`, `cantidad`, `precio_unidad`) VALUES
(228, 29, 1, 6),
(228, 30, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
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
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre_producto`, `descripcion`, `precio_unidad`, `categoria_id`, `img`) VALUES
(1, 'Fingers de queso Mozzarella', 'Para compartir, para ti solo, antes de la hamburguesa, después… Da igual cuando los pruebes, que te van a flipar igual. Pilla tus Gouda Rings de 4 u 8 unidades ¡y goza con el queso fundido de su interior!', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1637070524080_donuts_goudax8.png'),
(5, 'Alitas de pollo', 'Prueba nuestras nuevas alitas, más grandes y sabrosas, perfectas para los hambrientos amantes del buen pollo. Si van a darte alas, que sean de éstas.', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1667459875822_Homeria_Alitas_6UDS_600X411.png'),
(19, 'Brutal Bacon (2 Carnes)', 'Sabemos que te encanta el bacon, pero cocinarlo es un lío. Déjate de problemas con la nueva Brutal Bacon. Una hamburguesa donde el bacon es el personaje principal, con dos carnes de vacuno, lonchas de bacon, bits de bacon, salsa sweet bacon y pan de bacon', 11, 5, 'https://gps.burgerkingencasa.es/images/products/1667472596663_BRUTAL-BACON_2carnes.png'),
(20, 'Brutal Bacon (1 Carne)', 'Sabemos que te encanta el bacon, pero cocinarlo es un lio. Dejate de problemas con la nueva Brutal Bacon. Una hamburguesa donde el bacon es el personaje principal, con una carne de vacuno, lonchas de bacon, bits de bacon, salsa sweet bacon y pan de bacon.', 10, 5, 'https://gps.burgerkingencasa.es/images/products/1667472538034_BRUTAL-BACON_1carne.png'),
(21, 'Brutal Bacon Crispy Chicken', 'Sabemos que te encanta el bacon, pero cocinarlo es un lío. Déjate de problemas con la nueva Brutal Bacon. Una hamburguesa donde el bacon es el personaje principal, con dos piezas de Crispy Chicken®, lonchas de bacon, bits de bacon, salsa sweet bacon y pan', 13, 5, 'https://gps.burgerkingencasa.es/images/products/1697713438134_HOMERIA-BRUTAL-BACON-CRISPY-1-PATTY-NUEVO.png'),
(22, 'Brutal Bacon Doble Crispy Chicken', 'Sabemos que te encanta el bacon, pero cocinarlo es un lío. Déjate de problemas con la nueva Brutal Bacon. Una hamburguesa donde el bacon es el personaje principal, con dos piezas de Crispy Chicken®, lonchas de bacon, bits de bacon, salsa sweet bacon y pan', 14, 5, 'https://gps.burgerkingencasa.es/images/products/1667472396703_BRUTAL-BACON_pollo.png'),
(23, 'CBK Doble', 'Si la nueva CBK te suena de algo, es por el krunch. C de Chicken, B de bacon y K de krujiente. Con doble de nuestro pollo crujiente, mucho bacon y cebolla crispy, normal que cruja. Acompañados de salsa CBK, queso y lechuga fresca entre pan brioche de baco', 12, 5, 'https://gps.burgerkingencasa.es/images/products/1693829714306_homeria_MB_CBK.png'),
(24, 'CBK', 'Si la nueva CBK te suena de algo, es por el krunch. C de Chicken, B de bacon y K de krujiente. Con nuestro pollo crujiente, mucho bacon y cebolla crispy, normal que cruja. Acompañados de salsa CBK, queso y lechuga fresca entre pan brioche de bacon. ¡La K ', 11, 5, 'https://gps.burgerkingencasa.es/images/products/1693829825827_homeria_CCB_sin_semillas_copia.png'),
(25, 'Duo Bacon Cheddar (2 Carnes)', 'Las segundas partes no son buenas... son mejores! Porque tu Duo favorita, ahora tiene pan brioche. Y vuelve con todo: deliciosa salsa de queso cheddar, la estrella del show, acompañada de dos lonchas de bacon, dos lonchas de queso cheddar, cebolla frita y', 13, 5, 'https://gps.burgerkingencasa.es/images/products/1693909322303_homeria_duo-bacon-cheddar-menu_doble-carne_SS.png'),
(26, 'Duo Bacon Cheddar (1 Carne)', 'Una tentación en la que volverás a caer... ahora con pan brioche, increíble. Y vuelve con todo: deliciosa salsa de queso cheddar, la estrella del show, acompañada de dos lonchas de bacon, cebolla frita y tomate. No intentes resistirte, merece la pena.', 14, 5, 'https://gps.burgerkingencasa.es/images/products/1693909356532_homeria_duo-bacon-cheddar-menu_carne_SS.png'),
(27, 'Duo Bacon Cheddar - Doble Crispy Chicken', '¡Ha vuelto! Y no vas a creértelo... ahora tiene pan brioche. La Cheddar Bacon Duo que tanto echabas de menos está de vuelta. Y con lo que te gusta: dos lonchas de bacon, dos lonchas de queso cheddar, cebolla frita y tomate. Si, un sueño.', 15, 5, 'https://gps.burgerkingencasa.es/images/products/1693909391714_homeria_duo-bacon-cheddar-menu_crispy_SS.png'),
(28, 'Angus Grill (2 Carnes)', 'Solo unos expertos en carne a la parrilla podían traerte la nueva Angus Grill de Originals, con el máximo sabor de la carne, hasta en la salsa. 150 gramos de 100% Angus acompañados de queso Gruyer, crujiente bacon, tomate fresco, rúcula y canónigos entre ', 13, 5, 'https://gps.burgerkingencasa.es/images/products/1693830049665_angus_SS_2c.png'),
(29, 'Chicken Nuggets', 'Nuevos deliciosos, crujientes, dorados… dipealos en su sabrosa salsa. disponibles en 6, 9 ó 20 uds.', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1697203591617_nuggets_x6.png'),
(30, 'Patatas Clásicas', 'Ahora puedes acompañar tus menús con las deliciosas Patatas Clásicas. Pruébalas además con la nueva salsa Sour Cream.', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1515751854847_Supreme_Sour.png'),
(31, 'Chili Cheese Bites', 'Nuevos Chili Cheese Bites con salsa cheddar y jalapeños.', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1660726160893_Chili-Cheese-Bites-x9-new.png'),
(32, 'Aros de Cebolla', 'El Olimpo para los amantes de las cebollas. Los aros de cebolla King se pueden solicitar como entrada o acompañamiento, para compartir o solo para ti, son perfectos para todos, son redondos, sabrosos, crujientes y dorados, por sí solos o para acompañar co', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1660727204063_AROS-DE-CEBOLLA-x10-NEW.png'),
(33, 'Nuggets vegetales', 'Crujientes, dorados, deliciosos. Los nuggets de toda la vida, con todo su sabor, pero hechos con plantas. Disfruta los nuevos nuggets vegetales en 6 o 9 unidades. Ahora sin aromas, conservantes ni colorantes artificiales.', 6, 1, 'https://gps.burgerkingencasa.es/images/products/1675841765115_bodegones-app-600x411_4_nuggets-vegetales.png'),
(34, 'Coca-Cola', 'Coca-Cola es una famosa bebida gaseosa de cola conocida por su sabor refrescante y característico. Se distingue por su distintivo color oscuro y su efervescencia, y es uno de los refrescos más consumidos a nivel mundial.', 7.5, 3, 'https://gps.burgerkingencasa.es/images/products/1661171529271_Bebidas-CC-ZERO-vaso-new.png'),
(36, 'Trina', 'descripcionTrina es una bebida refrescante que combina el sabor de la fruta con burbujas, ofreciendo una experiencia refrescante. Con una variedad de sabores frutales, Trina es conocida por su vibrante y deliciosa gama de opciones.', 7.5, 3, 'https://gps.burgerkingencasa.es/images/products/1565091336509_Trina_LoCal.png'),
(38, 'Coca-Cola Zero', 'Coca-Cola Zero es una versión sin azúcar de la clásica Coca-Cola, diseñada para aquellos que buscan el sabor característico de la cola sin las calorías adicionales. Ofrece la misma refrescante experiencia, pero con cero azúcar.', 7.5, 3, 'https://gps.burgerkingencasa.es/images/products/1661171529271_Bebidas-CC-ZERO-vaso-new.png'),
(39, 'Fanta Naranja Zero', 'Fanta Naranja Zero es una versión sin azúcar de la clásica Fanta Naranja. Con su distintivo sabor a naranja y burbujas efervescentes, esta opción ofrece una experiencia refrescante sin las calorías añadidas del azúcar, siendo una alternativa más ligera.', 7.5, 3, 'https://gps.burgerkingencasa.es/images/products/1595931712585_Naranja_Zero.png'),
(41, 'Fanta Limón Zero', 'Fanta Limón Zero es una versión sin azúcar de la Fanta Limón clásica. Con su sabor a limón refrescante y burbujeante, esta bebida ofrece una alternativa ligera para quienes disfrutan del toque cítrico sin el contenido de azúcar', 7.5, 3, 'https://gps.burgerkingencasa.es/images/products/1595931970340_Limon_Zero.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `contra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cliente_id`, `nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES
(1, 'Admin', 'admin', 'admin@restaurantebd.com', 'Administrador', '1234'),
(8, 'Marc', 'Martínez', 'marcmartinezsotillo@gmail.com', 'Cliente', '1234'),
(32, 'Alex', 'Martínez', 'alex@gmail.com', 'Cliente', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD KEY `pedido_id` (`pedido_id`,`producto_id`),
  ADD KEY `fk4` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`cliente_id`);

--
-- Filtros para la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`pedido_id`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
