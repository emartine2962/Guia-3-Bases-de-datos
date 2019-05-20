-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ordenes` (
  `idOrdenes` int(11) NOT NULL AUTO_INCREMENT,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Pago_idPago` int(11) NOT NULL,
  `Domiciliario_idDomiciliario` int(11) NOT NULL,
  `Tienda_idTienda` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  PRIMARY KEY (`idOrdenes`,`Usuarios_idUsuarios`,`Pago_idPago`,`Domiciliario_idDomiciliario`,`Tienda_idTienda`,`Productos_idProductos`),
  KEY `fk_Ordenes_Usuarios_idx` (`Usuarios_idUsuarios`),
  KEY `fk_Ordenes_Pago1_idx` (`Pago_idPago`),
  KEY `fk_Ordenes_Domiciliario1_idx` (`Domiciliario_idDomiciliario`),
  KEY `fk_Ordenes_Tienda1_idx` (`Tienda_idTienda`),
  KEY `fk_Ordenes_Productos1_idx` (`Productos_idProductos`),
  CONSTRAINT `fk_Ordenes_Domiciliario1` FOREIGN KEY (`Domiciliario_idDomiciliario`) REFERENCES `domiciliario` (`idDomiciliario`),
  CONSTRAINT `fk_Ordenes_Pago1` FOREIGN KEY (`Pago_idPago`) REFERENCES `pago` (`idPago`),
  CONSTRAINT `fk_Ordenes_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`),
  CONSTRAINT `fk_Ordenes_Tienda1` FOREIGN KEY (`Tienda_idTienda`) REFERENCES `tienda` (`idTienda`),
  CONSTRAINT `fk_Ordenes_Usuarios` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes`
--

LOCK TABLES `ordenes` WRITE;
/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
INSERT INTO `ordenes` VALUES (1,'2019-05-16 00:00:00','2019-05-16 00:00:00','Activo',1,1,1,1,1);
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-19 22:47:31
