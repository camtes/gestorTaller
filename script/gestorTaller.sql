
--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `telefono2` int(11),
  `direccion` varchar(50),
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Table structure for table `sat`
--

CREATE TABLE `sat` (
  `id_sat` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `rep` varchar(9) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `informe` varchar(255) DEFAULT NULL,
  `fecha_entrada`date NOT NULL,
  `fecha_salida`date NULL,
  `anio` int(4) NOT NULL,
  `piezas` varchar(255) DEFAULT NULL,
  `precio_rep` double DEFAULT NULL,
  `precio_piezas` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_sat`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


UNLOCK TABLES;

--
-- Si no tienes ningún usuario para la base de datos de gestorTaller, con las dos líneas de abajo
--
--
-- grant all privileges on gestorTaller.* to 'gTaller_user'@'%' identified by 'g3stor' with grant option;
-- flush privileges;
