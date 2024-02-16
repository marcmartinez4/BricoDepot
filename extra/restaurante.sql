-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 16-02-2024 a les 17:32:36
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
(3, 'Bebidas'),
(5, 'Hamburguesas');

-- --------------------------------------------------------

--
-- Estructura de la taula `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `propina` int(11) DEFAULT NULL,
  `precio_total` double DEFAULT NULL,
  `puntos_usados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `estado`, `fecha_pedido`, `cliente_id`, `propina`, `precio_total`, `puntos_usados`) VALUES
(288, 'Pendiente', '2024-02-16', 1, 3, 7.46, 500),
(289, 'Pendiente', '2024-02-16', 1, 3, 7.46, 500),
(290, 'Pendiente', '2024-02-16', 1, 3, 5.46, 700),
(291, 'Pendiente', '2024-02-16', 1, 7, 8.95, 400),
(292, 'Pendiente', '2024-02-16', 1, 3, 7.46, 500),
(293, 'Pendiente', '2024-02-16', 1, 3, 7.46, 500),
(294, 'Pendiente', '2024-02-16', 1, 3, 24.93, 0),
(295, 'Pendiente', '2024-02-16', 1, 3, 12.46, 0),
(296, 'Pendiente', '2024-02-16', 1, 3, 12.46, 0),
(297, 'Pendiente', '2024-02-16', 1, 3, 12.46, 0),
(298, 'Pendiente', '2024-02-16', 1, 3, 12.46, 0),
(299, 'Pendiente', '2024-02-16', 1, 3, 12.46, 0);

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

--
-- Bolcament de dades per a la taula `pedido_productos`
--

INSERT INTO `pedido_productos` (`pedido_id`, `producto_id`, `cantidad`, `precio_unidad`) VALUES
(288, 19, 1, 11),
(289, 19, 1, 11),
(290, 19, 1, 11),
(291, 19, 1, 11),
(292, 19, 1, 11),
(293, 19, 1, 11),
(294, 19, 2, 11),
(295, 19, 1, 11),
(296, 19, 1, 11),
(297, 19, 1, 11),
(298, 19, 1, 11),
(299, 19, 1, 11);

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
-- Estructura de la taula `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `review` text NOT NULL,
  `fecha` date NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `reviews`
--

INSERT INTO `reviews` (`review_id`, `cliente_id`, `pedido_id`, `titulo`, `review`, `fecha`, `puntuacion`, `nombre`, `apellido`) VALUES
(1, 1, 1, 'Una experiencia deliciosa y rápida', 'Visitamos este local de comida rápida en busca de una solución rápida para satisfacer nuestro apetito, y salimos muy satisfechos con la experiencia general. La comida era deliciosa y fresca, cumpliendo con nuestras expectativas de un lugar de comida rápida.\n\nEl menú ofrecía una variedad de opciones, desde opciones clásicas hasta algunas más innovadoras, lo que hizo que la elección fuera un tanto difícil, pero al final, nuestras elecciones fueron acertadas. La preparación fue rápida, y el personal mostró eficiencia y amabilidad en el servicio.\n\nEl ambiente era limpio y acogedor, y aunque el espacio para sentarse era limitado, pudimos disfrutar de nuestra comida sin sentirnos apretados. La relación calidad-precio era razonable para la calidad de la comida que recibimos.\n\nEn resumen, este local de comida rápida ofrece una experiencia agradable y deliciosa para aquellos que buscan una comida rápida de calidad. Con su servicio eficiente y opciones sabrosas en el menú, merece una sólida calificación de 4 estrellas.', '2024-01-11', 4, 'Admin', 'BricoDepot'),
(2, 8, 229, 'Experiencia culinaria excepcional', '¡Este lugar de comida rápida ha superado todas mis expectativas! Desde la primera vez que entré, quedé impresionado por la atención al cliente, la calidad de los alimentos y la atmósfera acogedora.\n\nEl personal es extremadamente amable y siempre está dispuesto a ayudar a los clientes a tomar decisiones informadas sobre sus opciones de menú. La rapidez del servicio no compromete la frescura y el sabor de los alimentos. Además, me encanta que ofrezcan opciones saludables sin sacrificar el delicioso sabor que caracteriza a la comida rápida.\n\nEl menú es variado y ofrece una amplia gama de opciones, desde opciones clásicas hasta creaciones únicas que satisfacen todos los gustos. La presentación de los platos demuestra un cuidado especial por los detalles, lo que eleva la experiencia a otro nivel.\n\nEl ambiente del lugar es moderno y limpio, creando un espacio perfecto para disfrutar de una comida rápida de alta calidad. Además, la música ambiental crea una atmósfera agradable que complementa perfectamente la experiencia gastronómica.\n\nEn resumen, este local de comida rápida ha logrado combinar la conveniencia de un servicio rápido con la excelencia en calidad y sabor. Recomiendo encarecidamente este lugar a cualquier amante de la buena comida que busca una experiencia culinaria excepcional. ¡Sin duda, merece cada una de sus cinco estrellas!', '2024-01-11', 5, 'Marc', 'Martínez'),
(3, 32, 230, 'Experiencia promedio, con margen de mejora', 'Mi visita a este local de comida rápida dejó una impresión mixta. En primer lugar, la ubicación es conveniente y el servicio fue rápido y eficiente. Sin embargo, la calidad de la comida no cumplió completamente con mis expectativas.\n\nOpté por uno de sus combos, y aunque la porción era adecuada, el sabor no fue excepcional. La hamburguesa estaba bien, pero no destacaba en comparación con otras opciones disponibles en la zona. Además, encontré que las papas fritas estaban un poco grasosas, lo que restó puntos a la experiencia general.\n\nEl ambiente del lugar era bastante estándar para un establecimiento de comida rápida, con un ambiente animado y limpio. El personal, aunque amable, parecía un poco apresurado, lo que podría explicar algunos de los detalles pasados por alto en la preparación de la comida.\n\nEn resumen, este local ofrece una comida rápida aceptable, pero hay margen para mejorar en términos de sabor y atención a los detalles. Con algunas mejoras en la calidad de los ingredientes y una mayor atención al servicio al cliente, podría elevarse a un nivel superior.', '2024-01-11', 3, 'Alex', 'Martínez'),
(4, 35, 231, 'Experiencia mediocre, deja mucho que desear', 'Mi visita a este local de comida rápida fue bastante decepcionante. A pesar de las expectativas iniciales, la experiencia en general dejó mucho que desear. El servicio fue lento y poco atento, lo cual resultó frustrante, especialmente considerando la naturaleza de la comida rápida.\n\nLa calidad de la comida tampoco estuvo a la altura de mis expectativas. Los alimentos parecían carecer de frescura, y la presentación dejaba mucho que desear. Además, los precios no coincidían con la calidad ofrecida. Sentí que pagué demasiado por lo que obtuve.\n\nEl ambiente del local tampoco contribuyó positivamente a la experiencia. El lugar parecía descuidado, y las mesas no estaban limpias. La falta de atención a los detalles se hizo evidente, lo que afectó mi percepción general del establecimiento.\n\nEn resumen, mi visita a este local de comida rápida no cumplió con mis expectativas en términos de servicio, calidad de la comida y ambiente. Aunque no fue una experiencia totalmente negativa, definitivamente hay margen para mejorar en varios aspectos clave.', '2024-01-11', 2, 'Paco', 'Galaxia'),
(5, 36, 231, 'Una experiencia lamentable', 'Visité este local de comida rápida con grandes expectativas, pero mi experiencia fue decepcionante en todos los aspectos. Desde el momento en que entré, noté la falta de higiene en el lugar. Las mesas estaban sucias y parecía que no se habían limpiado en días.\n\nLa atención al cliente fue pésima. El personal parecía desinteresado y poco amable. Tuve que esperar mucho tiempo para realizar mi pedido, y cuando finalmente lo hice, mi comida tardó una eternidad en llegar. La falta de organización en la cocina era evidente, y el personal no mostraba ningún sentido de urgencia para atender a los clientes.\n\nCuando finalmente recibí mi pedido, quedé horrorizado al descubrir que la comida estaba fría y completamente insípida. Parecía como si hubiera sido recalentada una y otra vez. La presentación dejaba mucho que desear, y la calidad de los ingredientes era cuestionable.\n\nEn resumen, esta fue una experiencia culinaria lamentable. No puedo recomendar este lugar a nadie que busque una comida rápida y sabrosa. La falta de limpieza, la atención al cliente deficiente y la calidad de la comida hacen que este local merezca su baja calificación.', '2024-01-11', 1, 'Ernesto', 'Viyuela'),
(15, 1, 239, 'Una Experiencia Notable', 'Mi experiencia en BricoDepot ha sido sumamente positiva, justificando sin duda las cuatro estrellas que le otorgo. Desde que entré, la rapidez y la satisfacción han sido las principales características que destacan en este restaurante de comida rápida.  Lo más destacado de BricoDepot es la frescura y autenticidad de sus ingredientes. La calidad de la comida es evidente en cada bocado, y la velocidad con la que se preparan y sirven los platillos añade un componente de eficiencia que se agradece, especialmente para aquellos con agendas apretadas.  Los combos y ofertas especiales son una verdadera fortaleza. La diversidad del menú y la capacidad de personalizar los pedidos hacen que BricoDepot sea una elección versátil y apetitosa. Además, el personal es amable y eficiente, lo que agrega un toque positivo a la experiencia culinaria.', '2024-01-26', 5, 'Admin', 'BricoDepot'),
(16, 1, 242, 'Una Experiencia Notable', 'Mi experiencia en BricoDepot ha sido sumamente positiva, justificando sin duda las cuatro estrellas que le otorgo. Desde que entré, la rapidez y la satisfacción han sido las principales características que destacan en este restaurante de comida rápida.  Lo más destacado de BricoDepot es la frescura y autenticidad de sus ingredientes. La calidad de la comida es evidente en cada bocado, y la velocidad con la que se preparan y sirven los platillos añade un componente de eficiencia que se agradece, especialmente para aquellos con agendas apretadas.  Los combos y ofertas especiales son una verdadera fortaleza. La diversidad del menú y la capacidad de personalizar los pedidos hacen que BricoDepot sea una elección versátil y apetitosa. Además, el personal es amable y eficiente, lo que agrega un toque positivo a la experiencia culinaria.', '2024-01-29', 1, 'Admin', 'BricoDepott');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `contra` varchar(255) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `usuarios`
--

INSERT INTO `usuarios` (`cliente_id`, `nombre`, `apellido`, `mail`, `rol`, `contra`, `puntos`) VALUES
(1, 'Admin', 'BricoDepot', 'admin@restaurantebd.com', 'Administrador', '1234', 6525),
(8, 'Marc', 'Martínez', 'marcmartinezsotillo@gmail.com', 'Cliente', '1234', NULL),
(32, 'Alex', 'Martínez', 'alex@gmail.com', 'Cliente', '1234', NULL),
(35, 'Paco', 'Galaxia', 'pacogalaxia@mail.com', 'Cliente', '1234', NULL),
(36, 'Ernesto', 'Viyuela', 'ernestoviyuela@mail.com', 'Cliente', '1234', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `videojuegos`
--

CREATE TABLE `videojuegos` (
  `videojuego_id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Bolcament de dades per a la taula `videojuegos`
--

INSERT INTO `videojuegos` (`videojuego_id`, `nombre`, `descripcion`) VALUES
(1, 'GeoGuessr', 'Juego de ubicación geográfica'),
(2, 'Where in the World is Carmen Sandiego', 'Juego de búsqueda de criminales internacionales'),
(3, 'Oregon Trail', 'Simulador de la ruta de migración histórica'),
(4, 'Age of Empires', 'Juego de estrategia en tiempo real'),
(5, 'CodeCombat', 'Plataforma para aprender programación jugando'),
(6, 'LightBot', 'Juego de resolución de rompecabezas con programación'),
(7, 'Zamzee', 'Juego que fomenta la actividad física'),
(8, 'Sworkit Youth: Fitness for Kids', 'Aplicación de ejercicios físicos para niños'),
(9, 'Eco', 'Juego de simulación de ecosistemas'),
(10, 'Farming Simulator', 'Simulador de vida agrícola'),
(11, 'Story Cubes', 'Juego de dados para fomentar la creatividad'),
(12, 'Scrivener', 'Software de escritura y organización de proyectos'),
(13, 'Monopoly', 'Juego de mesa de propiedad y negocios'),
(14, 'Moneyville', 'Juego educativo sobre finanzas y dinero'),
(15, 'Math Blaster', 'Juego educativo de matemáticas'),
(16, 'DragonBox Algebra', 'Juego educativo de álgebra'),
(17, 'Spore', 'Juego de simulación de evolución'),
(18, 'Kerbal Space Program', 'Simulador de exploración espacial'),
(19, 'Assassin\'s Creed: Discovery Tour', 'Modo educativo de la serie Assassin\'s Creed'),
(20, 'Civilization VI', 'Juego de estrategia de construcción de civilizaciones'),
(21, 'Duolingo', 'Plataforma de aprendizaje de idiomas'),
(22, 'Rosetta Stone', 'Software de aprendizaje de idiomas'),
(23, 'Lumosity', 'Juegos para el entrenamiento cerebral'),
(24, 'Elevate', 'Aplicación para el desarrollo personal'),
(25, 'Minecraft: Education Edition', 'Versión educativa de Minecraft'),
(26, 'SimCity', 'Juego de simulación de construcción de ciudades'),
(27, 'Artful Escape', 'Videojuego de aventuras y música'),
(28, 'Kahoot!', 'Plataforma de aprendizaje basada en juegos'),
(29, 'Coolmath Games', 'Juegos educativos de matemáticas'),
(30, 'Prodigy', 'Plataforma de juego educativo de matemáticas'),
(31, 'BioMan Biology', 'Juego educativo de biología'),
(32, 'ChemCaper', 'Juego educativo de química'),
(33, 'Valiant Hearts: The Great War', 'Juego de aventuras históricas'),
(34, 'Age of Exploration', 'Juego educativo sobre la era de la exploración'),
(35, 'Busuu', 'Plataforma de aprendizaje de idiomas'),
(36, 'Influent', 'Juego para aprender vocabulario en varios idiomas'),
(37, 'Brain Age', 'Juego de entrenamiento cerebral'),
(38, 'CogniFit Brain Fitness', 'Plataforma para el entrenamiento cerebral'),
(39, 'Toontown Online', 'Juego en línea de Disney con enfoque educativo'),
(40, 'Life is Strange', 'Videojuego de aventuras con elementos narrativos'),
(41, 'LittleBigPlanet', 'Juego de plataforma y creación'),
(42, 'Art Academy', 'Software de creación artística'),
(43, 'Seterra Online', 'Juego de geografía para aprender sobre lugares del mundo'),
(44, 'Rome: Total War', 'Juego de estrategia en tiempo real ambientado en la antigua Roma'),
(45, 'Crusader Kings III', 'Juego de estrategia de simulación de dinastías'),
(46, 'Human Resource Machine', 'Juego de rompecabezas basado en programación'),
(47, 'Cargo-Bot', 'Juego de rompecabezas de programación'),
(48, 'Super Stretch Yoga', 'Aplicación de yoga para niños'),
(49, 'Fitness Boxing', 'Juego de ejercicios de boxeo'),
(50, 'SimEarth', 'Juego de simulación de desarrollo planetario'),
(51, 'Cities Skylines', 'Juego de simulación de construcción y gestión de ciudades'),
(52, 'Story Jumper', 'Plataforma para crear y compartir historias'),
(53, 'The Typing of the Dead', 'Juego educativo de mecanografía'),
(54, 'Stock Market Game', 'Juego educativo sobre el mercado de valores'),
(55, 'Monopoly Tycoon', 'Versión de Monopoly centrada en la construcción de imperios comerciales');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

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
  ADD KEY `pedido_id` (`pedido_id`,`producto_id`),
  ADD KEY `fk4` (`producto_id`);

--
-- Índexs per a la taula `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índexs per a la taula `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Índexs per a la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índexs per a la taula `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`videojuego_id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT per la taula `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT per la taula `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la taula `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `videojuego_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`cliente_id`);

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
