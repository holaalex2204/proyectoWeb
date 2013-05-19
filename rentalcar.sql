-- MySQL dump 10.13  Distrib 5.5.27, for osx10.6 (i386)
--
-- Host: localhost    Database: rentalcar
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carro`
--

DROP TABLE IF EXISTS `carro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carro` (
  `noSerie` varchar(45) NOT NULL,
  `modelo` int(11) NOT NULL,
  `status` enum('Disponible','No Disponible') DEFAULT NULL,
  `transmision` enum('Automatica','Manual') DEFAULT NULL,
  `precioDia` float DEFAULT NULL,
  `sucursal` int(11) NOT NULL,
  PRIMARY KEY (`noSerie`),
  KEY `modelo` (`modelo`),
  CONSTRAINT `carro_ibfk_1` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carro`
--

LOCK TABLES `carro` WRITE;
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (2,'Acapulco'),(4,'Cancún'),(7,'Cozumel'),(1,'Distrito Federal'),(3,'Estado de México'),(6,'Jalisco'),(5,'Querétaro');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `app` varchar(45) DEFAULT NULL,
  `apm` varchar(45) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `capacidadPersonas` int(11) DEFAULT NULL,
  `rendimiento` double(5,2) DEFAULT NULL,
  `categoria` enum('Compacto','Mediano','Deportivo','Lujoso','SUV','Furgoneta','Todo Terreno') DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`,`year`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'FIAT 500C',2013,4,15.85,'Compacto',NULL),(2,'FORK IKON',2013,4,18.00,'Compacto',NULL);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (2,'EUA'),(1,'México');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `renta`
--

DROP TABLE IF EXISTS `renta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renta` (
  `id` int(11) NOT NULL,
  `ini` date NOT NULL,
  `fin` date NOT NULL,
  `importe` int(11) DEFAULT NULL,
  `id_sitio` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `noSerie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sitio` (`id_sitio`),
  KEY `id_cliente` (`id_cliente`),
  KEY `noSerie` (`noSerie`),
  CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`id_sitio`) REFERENCES `sitio` (`id`),
  CONSTRAINT `renta_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `renta_ibfk_3` FOREIGN KEY (`noSerie`) REFERENCES `carro` (`noSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renta`
--

LOCK TABLES `renta` WRITE;
/*!40000 ALTER TABLE `renta` DISABLE KEYS */;
/*!40000 ALTER TABLE `renta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitio`
--

DROP TABLE IF EXISTS `sitio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` int(11) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `sitio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pais` (`pais`,`ciudad`,`sitio`),
  KEY `ciudad` (`ciudad`),
  CONSTRAINT `sitio_ibfk_1` FOREIGN KEY (`pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sitio_ibfk_2` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitio`
--

LOCK TABLES `sitio` WRITE;
/*!40000 ALTER TABLE `sitio` DISABLE KEYS */;
INSERT INTO `sitio` VALUES (7,1,1,'Aeropuerto Internacional de la Ciudad de México'),(5,1,3,'Aeropuerto de Toluca'),(1,1,5,'Centro Histórico'),(4,1,6,'Centro Histórico'),(6,1,7,'Puerto Puerta Maya');
/*!40000 ALTER TABLE `sitio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitiosServicio`
--

DROP TABLE IF EXISTS `sitiosServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitiosServicio` (
  `id_sucursal` int(11) NOT NULL,
  `id_sitio` int(11) NOT NULL,
  PRIMARY KEY (`id_sucursal`,`id_sitio`),
  KEY `id_sitio` (`id_sitio`),
  CONSTRAINT `sitiosservicio_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`),
  CONSTRAINT `sitiosservicio_ibfk_2` FOREIGN KEY (`id_sitio`) REFERENCES `sitio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitiosServicio`
--

LOCK TABLES `sitiosServicio` WRITE;
/*!40000 ALTER TABLE `sitiosServicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `sitiosServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-19 15:03:33
