-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `actividads`
--

DROP TABLE IF EXISTS `actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCC` int(10) unsigned NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaFinal` date NOT NULL,
  `fechaInicial` date NOT NULL,
  `tipoActividad` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prueba',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actividads_idcc_foreign` (`idCC`),
  CONSTRAINT `actividads_idcc_foreign` FOREIGN KEY (`idCC`) REFERENCES `barrio_cantons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividads`
--

LOCK TABLES `actividads` WRITE;
/*!40000 ALTER TABLE `actividads` DISABLE KEYS */;
INSERT INTO `actividads` VALUES (1,'reparación de calle',2,'calles_cafayate.gif','botar tierra','2017-10-30','2017-10-30','1',0,'2017-10-31 04:30:39','2017-10-31 04:30:39'),(2,'mision oficial',1,'Imaen1.png','ninguna','2017-11-01','2017-11-01','3',0,'2017-11-02 02:34:54','2017-11-02 02:34:54');
/*!40000 ALTER TABLE `actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `articulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignar_mot_maqs`
--

DROP TABLE IF EXISTS `asignar_mot_maqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignar_mot_maqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMotorista` int(10) unsigned NOT NULL,
  `idMaquinaria` int(10) unsigned NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `unidad` int(11) NOT NULL,
  `observacionAsiM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoAsignacionMaq` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asignar_mot_maqs_idmotorista_foreign` (`idMotorista`),
  KEY `asignar_mot_maqs_idmaquinaria_foreign` (`idMaquinaria`),
  CONSTRAINT `asignar_mot_maqs_idmaquinaria_foreign` FOREIGN KEY (`idMaquinaria`) REFERENCES `maquinarias` (`id`),
  CONSTRAINT `asignar_mot_maqs_idmotorista_foreign` FOREIGN KEY (`idMotorista`) REFERENCES `motoristas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignar_mot_maqs`
--

LOCK TABLES `asignar_mot_maqs` WRITE;
/*!40000 ALTER TABLE `asignar_mot_maqs` DISABLE KEYS */;
INSERT INTO `asignar_mot_maqs` VALUES (3,1,1,'2017-11-02','2017-11-02',1,'sdad',1,'2017-11-02 21:38:21','2017-11-02 21:38:21'),(4,2,2,'2017-11-02','2017-11-02',1,'qweqe',0,'2017-11-02 21:38:50','2017-11-02 21:49:57');
/*!40000 ALTER TABLE `asignar_mot_maqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignar_mot_vehs`
--

DROP TABLE IF EXISTS `asignar_mot_vehs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignar_mot_vehs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idMotorista` int(10) unsigned NOT NULL,
  `idVehiculo` int(10) unsigned NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `unidad` int(11) NOT NULL,
  `observacionAsiV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoAsignacion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asignar_mot_vehs_idmotorista_foreign` (`idMotorista`),
  KEY `asignar_mot_vehs_idvehiculo_foreign` (`idVehiculo`),
  CONSTRAINT `asignar_mot_vehs_idmotorista_foreign` FOREIGN KEY (`idMotorista`) REFERENCES `motoristas` (`id`),
  CONSTRAINT `asignar_mot_vehs_idvehiculo_foreign` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignar_mot_vehs`
--

LOCK TABLES `asignar_mot_vehs` WRITE;
/*!40000 ALTER TABLE `asignar_mot_vehs` DISABLE KEYS */;
INSERT INTO `asignar_mot_vehs` VALUES (11,3,1,'2017-11-02','2017-11-02',1,'asa',0,'2017-11-02 21:27:02','2017-11-02 21:27:23'),(12,3,1,'2017-11-02','2017-11-02',1,'jajaj',0,'2017-11-02 21:28:03','2017-11-02 21:29:50'),(13,3,1,'2017-11-02','2017-11-02',1,'kkaka',1,'2017-11-02 21:30:06','2017-11-02 21:30:06');
/*!40000 ALTER TABLE `asignar_mot_vehs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barrio_cantons`
--

DROP TABLE IF EXISTS `barrio_cantons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barrio_cantons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoB` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barrio_cantons`
--

LOCK TABLES `barrio_cantons` WRITE;
/*!40000 ALTER TABLE `barrio_cantons` DISABLE KEYS */;
INSERT INTO `barrio_cantons` VALUES (1,'Salida fuera del municipio','fuera',0,'2015-09-03 06:00:00','2015-09-03 06:00:00'),(2,'San Sebastian','Barrio',1,'2017-10-31 04:21:42','2017-10-31 04:21:42');
/*!40000 ALTER TABLE `barrio_cantons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacoras`
--

DROP TABLE IF EXISTS `bitacoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacoras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL,
  `accion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacoras_idusuario_foreign` (`idUsuario`),
  CONSTRAINT `bitacoras_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacoras`
--

LOCK TABLES `bitacoras` WRITE;
/*!40000 ALTER TABLE `bitacoras` DISABLE KEYS */;
INSERT INTO `bitacoras` VALUES (1,1,'Registro de nuevo Tipo: Camion de volteo','2017-10-30 01:29:55','2017-10-30 01:29:55'),(2,1,'Modificación del Tipo: cargadora a Cargadora','2017-10-30 01:37:55','2017-10-30 01:37:55'),(3,1,'Registro de nuevo Motorista-Operario: Anibal Soriano','2017-10-30 01:42:47','2017-10-30 01:42:47'),(4,1,'Actualización de datos de: Alex Fuentes','2017-10-30 01:48:20','2017-10-30 01:48:20'),(5,1,'Desactivo al Motorista: Jose  Alas','2017-10-30 01:48:28','2017-10-30 01:48:28'),(6,1,'Activo al Motorista: Jose  Alas','2017-10-30 01:48:37','2017-10-30 01:48:37'),(7,1,'Actualización de foto de: Alex Fuentes','2017-10-30 01:53:00','2017-10-30 01:53:00'),(8,1,'Registro de nuevo Marca: Hyundai','2017-10-30 01:55:46','2017-10-30 01:55:46'),(9,1,'Modificación de Marca: Hyundai a Hyundai','2017-10-30 01:55:59','2017-10-30 01:55:59'),(10,1,'Registro de nuevo Modelo: Prius','2017-10-30 02:01:23','2017-10-30 02:01:23'),(11,1,'Modificación de Modelo: Prius','2017-10-30 02:02:01','2017-10-30 02:02:01'),(12,1,'Actualización  de datos del Vehiculo: N-1234','2017-10-30 02:06:24','2017-10-30 02:06:24'),(13,1,'Desactivo el Vehiculo: N-1234','2017-10-30 02:06:31','2017-10-30 02:06:31'),(14,1,'Activo el Vehiculo: N-1234','2017-10-30 02:07:05','2017-10-30 02:07:05'),(15,1,'Actualizo foto del Vehiculo: N-1234','2017-10-30 02:07:29','2017-10-30 02:07:29'),(16,1,'Desactivo el: Equipo-01','2017-10-30 02:13:00','2017-10-30 02:13:00'),(17,1,'Activo el: Equipo-01','2017-10-30 02:13:07','2017-10-30 02:13:07'),(18,1,'Actualización  de datos del: Equipo-01','2017-10-30 02:13:17','2017-10-30 02:13:17'),(19,1,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-10-30 02:26:05','2017-10-30 02:26:05'),(20,1,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-10-30 02:31:08','2017-10-30 02:31:08'),(21,1,'Registro de nuevo Taller: Taller Nuñez','2017-10-30 02:45:16','2017-10-30 02:45:16'),(22,1,'Datos actualizado de : Taller Nuñez','2017-10-30 02:45:27','2017-10-30 02:45:27'),(23,1,'Desactivo al: Taller Nuñez','2017-10-30 02:45:34','2017-10-30 02:45:34'),(24,1,'Activo al: Taller Nuñez','2017-10-30 02:45:40','2017-10-30 02:45:40'),(25,1,'Registro de nuevo Mttn Preventico al Vehiculo\': N-1234','2017-10-30 02:53:59','2017-10-30 02:53:59'),(26,1,'Finalizo el Mttn Preventico del Vehiculo: N-1234','2017-10-30 02:56:01','2017-10-30 02:56:01'),(27,1,'Registro de nuevo Mttn Correctivo al Vehiculo\': N-1234','2017-10-30 03:08:57','2017-10-30 03:08:57'),(28,1,'Finalizó el Mttn Correctivo del Vehiculo: N-1234','2017-10-30 03:09:15','2017-10-30 03:09:15'),(29,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-10-31 04:18:36','2017-10-31 04:18:36'),(30,2,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-10-31 04:19:11','2017-10-31 04:19:11'),(31,1,'Registro de nueva Maquinaria: Equipo-02','2017-11-02 02:15:30','2017-11-02 02:15:30'),(32,1,'Asignación finalizada del : Equipo-01 al Operario Alex Fuentes','2017-11-02 02:20:10','2017-11-02 02:20:10'),(33,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:20:45','2017-11-02 02:20:45'),(34,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:20:45','2017-11-02 02:20:45'),(35,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:20:45','2017-11-02 02:20:45'),(36,1,'Asignación finalizada del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:22:34','2017-11-02 02:22:34'),(37,1,'Asignación finalizada del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:22:58','2017-11-02 02:22:58'),(38,1,'Asignación finalizada del : Equipo-02 al Operario Alex Fuentes','2017-11-02 02:23:06','2017-11-02 02:23:06'),(39,1,'Se registro una actividad : mision oficial','2017-11-02 02:34:54','2017-11-02 02:34:54'),(40,1,'Asignación finalizada del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:05:43','2017-11-02 03:05:43'),(41,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Jose  Alas','2017-11-02 03:18:55','2017-11-02 03:18:55'),(42,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:27:58','2017-11-02 03:27:58'),(43,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:27:59','2017-11-02 03:27:59'),(44,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:28:00','2017-11-02 03:28:00'),(45,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:28:00','2017-11-02 03:28:00'),(46,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:28:01','2017-11-02 03:28:01'),(47,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:30:56','2017-11-02 03:30:56'),(48,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:30:57','2017-11-02 03:30:57'),(49,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Jose  Alas','2017-11-02 03:31:58','2017-11-02 03:31:58'),(50,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Jose  Alas','2017-11-02 03:31:58','2017-11-02 03:31:58'),(51,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Jose  Alas','2017-11-02 03:31:59','2017-11-02 03:31:59'),(52,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Jose  Alas','2017-11-02 03:31:59','2017-11-02 03:31:59'),(53,1,'Nueva Asignación del : Equipo-02 al Operario Alex Fuentes','2017-11-02 03:34:46','2017-11-02 03:34:46'),(54,1,'Actualización de datos de: Jose  Alas','2017-11-02 03:35:20','2017-11-02 03:35:20'),(55,1,'Nueva Asignación del : Equipo-01 al Operario Jose  Alas','2017-11-02 03:35:49','2017-11-02 03:35:49'),(56,1,'Nueva Asignación del : Equipo-01 al Operario Jose  Alas','2017-11-02 03:35:54','2017-11-02 03:35:54'),(57,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:37:38','2017-11-02 03:37:38'),(58,1,'Asignación finalizada del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:37:58','2017-11-02 03:37:58'),(59,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:38:17','2017-11-02 03:38:17'),(60,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:42:18','2017-11-02 03:42:18'),(61,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:42:19','2017-11-02 03:42:19'),(62,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:43:40','2017-11-02 03:43:40'),(63,1,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 03:43:40','2017-11-02 03:43:40'),(64,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:23:07','2017-11-02 21:23:07'),(65,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:24:54','2017-11-02 21:24:54'),(66,2,'Asignación finalizada del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:25:08','2017-11-02 21:25:08'),(67,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:25:50','2017-11-02 21:25:50'),(68,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:27:02','2017-11-02 21:27:02'),(69,2,'Asignación finalizada del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:27:22','2017-11-02 21:27:22'),(70,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:28:03','2017-11-02 21:28:03'),(71,2,'Asignación finalizada del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:29:50','2017-11-02 21:29:50'),(72,2,'Nueva Asignación del Vehiculo : N-1234 al Motorista Anibal Soriano','2017-11-02 21:30:06','2017-11-02 21:30:06'),(73,2,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-11-02 21:33:29','2017-11-02 21:33:29'),(74,2,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-11-02 21:33:29','2017-11-02 21:33:29'),(75,2,'Nueva Asignación del : Equipo-01 al Operario Alex Fuentes','2017-11-02 21:38:21','2017-11-02 21:38:21'),(76,2,'Nueva Asignación del : Equipo-02 al Operario Jose  Alas','2017-11-02 21:38:50','2017-11-02 21:38:50'),(77,2,'Asignación finalizada del : Equipo-02 al Operario Jose  Alas','2017-11-02 21:49:57','2017-11-02 21:49:57'),(78,2,'Registro de nuevo Mttn Preventico al Vehiculo\': N-1234','2017-11-02 22:06:12','2017-11-02 22:06:12'),(79,2,'Finalizó el Mttn Preventivo del Vehiculo: N-1234','2017-11-02 22:07:50','2017-11-02 22:07:50'),(80,2,'Finalizó el Mttn Preventivo del Vehiculo: N-1234','2017-11-02 22:07:50','2017-11-02 22:07:50'),(81,2,'Registro de nuevo Mttn Preventico al \': Equipo-01','2017-11-02 22:14:23','2017-11-02 22:14:23'),(82,2,'Finalizó el Mttn Preventivo del : ','2017-11-02 22:15:32','2017-11-02 22:15:32'),(83,2,'Registro de nuevo Mttn Correctivo al Vehiculo\': N-1234','2017-11-02 22:22:34','2017-11-02 22:22:34'),(84,2,'Finalizó el Mttn Correctivo del Vehiculo: N-1234','2017-11-02 22:26:56','2017-11-02 22:26:56'),(85,2,'Finalizó el Mttn Correctivo del Vehiculo: N-1234','2017-11-02 22:26:56','2017-11-02 22:26:56'),(86,2,'Registro de nuevo Mttn Correctivo al \': Equipo-01','2017-11-02 22:32:54','2017-11-02 22:32:54'),(87,2,'Finalizó el Mttn Correctivo del : ','2017-11-02 22:34:31','2017-11-02 22:34:31'),(88,2,'Finalizó el Mttn Correctivo del : ','2017-11-02 22:34:31','2017-11-02 22:34:31'),(89,2,'Registro de nuevo Mttn Preventico al Vehiculo\': N-1234','2017-11-04 03:33:56','2017-11-04 03:33:56'),(90,2,'Finalizó el Mttn Preventivo del Vehiculo: N-1234','2017-11-04 03:36:48','2017-11-04 03:36:48'),(91,2,'Registro de nuevo Mttn Preventico al Vehiculo\': N-1234','2017-11-04 03:36:57','2017-11-04 03:36:57'),(92,2,'Registro de nuevo Mttn Preventico al \': Equipo-01','2017-11-07 15:28:04','2017-11-07 15:28:04'),(93,2,'Registro de nuevo Mttn Correctivo al \': Equipo-02','2017-11-07 15:47:54','2017-11-07 15:47:54'),(94,2,'Registro de nuevo Vehiculo: C-12345','2017-11-07 15:56:38','2017-11-07 15:56:38'),(95,2,'Registro de nuevo Mttn Correctivo al Vehiculo\': C-12345','2017-11-07 15:57:15','2017-11-07 15:57:15');
/*!40000 ALTER TABLE `bitacoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonia_caserios`
--

DROP TABLE IF EXISTS `colonia_caserios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonia_caserios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCC` int(10) unsigned NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colonia_caserios_idcc_foreign` (`idCC`),
  CONSTRAINT `colonia_caserios_idcc_foreign` FOREIGN KEY (`idCC`) REFERENCES `barrio_cantons` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonia_caserios`
--

LOCK TABLES `colonia_caserios` WRITE;
/*!40000 ALTER TABLE `colonia_caserios` DISABLE KEYS */;
INSERT INTO `colonia_caserios` VALUES (1,'El 7',2,'Imaen1.png','2017-10-31 04:23:16','2017-10-31 04:23:16');
/*!40000 ALTER TABLE `colonia_caserios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_actividads`
--

DROP TABLE IF EXISTS `detalle_actividads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_actividads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idActividad` int(10) unsigned NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_actividads_idactividad_foreign` (`idActividad`),
  CONSTRAINT `detalle_actividads_idactividad_foreign` FOREIGN KEY (`idActividad`) REFERENCES `actividads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_actividads`
--

LOCK TABLES `detalle_actividads` WRITE;
/*!40000 ALTER TABLE `detalle_actividads` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_actividads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento_correctivo_maqs`
--

DROP TABLE IF EXISTS `mantenimiento_correctivo_maqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento_correctivo_maqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idOrden` int(10) unsigned NOT NULL,
  `idMecanico` int(10) unsigned NOT NULL,
  `idMaquinaria` int(10) unsigned NOT NULL,
  `idMotorista` int(10) unsigned NOT NULL,
  `fechaInicioMtt` date NOT NULL,
  `fechaFinMtt` date NOT NULL,
  `fallasMaq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diagnosticoMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMttC` int(11) NOT NULL DEFAULT '1',
  `gastoMC` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mantenimiento_correctivo_maqs_idorden_foreign` (`idOrden`),
  KEY `mantenimiento_correctivo_maqs_idmecanico_foreign` (`idMecanico`),
  KEY `mantenimiento_correctivo_maqs_idmaquinaria_foreign` (`idMaquinaria`),
  KEY `mantenimiento_correctivo_maqs_idmotorista_foreign` (`idMotorista`),
  CONSTRAINT `mantenimiento_correctivo_maqs_idmaquinaria_foreign` FOREIGN KEY (`idMaquinaria`) REFERENCES `maquinarias` (`id`),
  CONSTRAINT `mantenimiento_correctivo_maqs_idmecanico_foreign` FOREIGN KEY (`idMecanico`) REFERENCES `mecanico_internos` (`id`),
  CONSTRAINT `mantenimiento_correctivo_maqs_idmotorista_foreign` FOREIGN KEY (`idMotorista`) REFERENCES `motoristas` (`id`),
  CONSTRAINT `mantenimiento_correctivo_maqs_idorden_foreign` FOREIGN KEY (`idOrden`) REFERENCES `ordens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento_correctivo_maqs`
--

LOCK TABLES `mantenimiento_correctivo_maqs` WRITE;
/*!40000 ALTER TABLE `mantenimiento_correctivo_maqs` DISABLE KEYS */;
INSERT INTO `mantenimiento_correctivo_maqs` VALUES (1,3,2,1,1,'2017-10-27','2017-10-27','Producción owner\r\nScrum master\r\nDeveloment team\r\nQue son programas\r\nAdministración de proyecto','\r\nEsas son de complementar\r\n\r\nAhí en las de paréntesis venían :',0,77,'2017-10-27 22:03:52','2017-10-27 22:05:07'),(2,5,2,1,1,'2017-10-27','2017-10-27','Producción owner\r\nScrum master\r\nDeveloment team\r\nQue son programas\r\nAdministración de proyecto','Venia la de PORTAFOLIo\r\nLas características de un jefe de proyecto\r\nPunto de equilibrio\r\nAnálisis costo beneficio\r\nAnálisis marginal',0,100,'2017-10-27 22:14:15','2017-10-27 22:14:33'),(3,13,3,1,1,'2017-11-02','2017-11-02','•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)','•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)',0,500,'2017-11-02 22:32:54','2017-11-02 22:34:31'),(4,17,2,2,1,'2017-11-07','2017-11-07','af\r\na\r\nfa\r\nfad\r\nas\r\nd\r\n\r\nasd','',1,0,'2017-11-07 15:47:54','2017-11-07 15:47:54');
/*!40000 ALTER TABLE `mantenimiento_correctivo_maqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento_correctivo_vehs`
--

DROP TABLE IF EXISTS `mantenimiento_correctivo_vehs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento_correctivo_vehs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idOrden` int(10) unsigned NOT NULL,
  `idMecanico` int(10) unsigned NOT NULL,
  `idVehiculo` int(10) unsigned NOT NULL,
  `idMotorista` int(10) unsigned NOT NULL,
  `fechaInicioMtt` date NOT NULL,
  `fechaFinMtt` date NOT NULL,
  `fallasVeh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diagnosticoMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMttC` int(11) NOT NULL DEFAULT '1',
  `gastoMC` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mantenimiento_correctivo_vehs_idorden_foreign` (`idOrden`),
  KEY `mantenimiento_correctivo_vehs_idmecanico_foreign` (`idMecanico`),
  KEY `mantenimiento_correctivo_vehs_idvehiculo_foreign` (`idVehiculo`),
  KEY `mantenimiento_correctivo_vehs_idmotorista_foreign` (`idMotorista`),
  CONSTRAINT `mantenimiento_correctivo_vehs_idmecanico_foreign` FOREIGN KEY (`idMecanico`) REFERENCES `mecanico_internos` (`id`),
  CONSTRAINT `mantenimiento_correctivo_vehs_idmotorista_foreign` FOREIGN KEY (`idMotorista`) REFERENCES `motoristas` (`id`),
  CONSTRAINT `mantenimiento_correctivo_vehs_idorden_foreign` FOREIGN KEY (`idOrden`) REFERENCES `ordens` (`id`),
  CONSTRAINT `mantenimiento_correctivo_vehs_idvehiculo_foreign` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento_correctivo_vehs`
--

LOCK TABLES `mantenimiento_correctivo_vehs` WRITE;
/*!40000 ALTER TABLE `mantenimiento_correctivo_vehs` DISABLE KEYS */;
INSERT INTO `mantenimiento_correctivo_vehs` VALUES (1,4,2,1,2,'2017-10-27','2017-10-27','\r\nEsas son de complementar\r\n\r\nAhí en las de paréntesis venían :','Producción owner\r\nScrum master\r\nDeveloment team\r\nQue son programas\r\nAdministración de proyecto',0,78,'2017-10-27 22:08:58','2017-10-27 22:12:41'),(2,7,2,1,3,'2017-10-29','2017-10-29','ajuste de motor','completado',0,300,'2017-10-30 03:08:56','2017-10-30 03:09:15'),(3,12,1,1,3,'2017-11-02','2017-11-02','•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)','•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)\r\n•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n',0,300,'2017-11-02 22:22:34','2017-11-02 22:26:55'),(4,18,3,2,3,'2017-11-07','2017-11-07','fd\r\ng\r\ngf\r\ngh\r\nf\r\nh\r\nhg\r\njh\r\n','',1,0,'2017-11-07 15:57:14','2017-11-07 15:57:14');
/*!40000 ALTER TABLE `mantenimiento_correctivo_vehs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento_pre_maqs`
--

DROP TABLE IF EXISTS `mantenimiento_pre_maqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento_pre_maqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idOrden` int(10) unsigned NOT NULL,
  `idMecanico` int(10) unsigned NOT NULL,
  `idMaquinaria` int(10) unsigned NOT NULL,
  `fechaInicioMtt` date NOT NULL,
  `fechaFinMtt` date NOT NULL,
  `observacionInicioMtt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionFinalMtt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMtt` int(11) NOT NULL DEFAULT '1',
  `gastoMPM` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mantenimiento_pre_maqs_idorden_foreign` (`idOrden`),
  KEY `mantenimiento_pre_maqs_idmecanico_foreign` (`idMecanico`),
  KEY `mantenimiento_pre_maqs_idmaquinaria_foreign` (`idMaquinaria`),
  CONSTRAINT `mantenimiento_pre_maqs_idmaquinaria_foreign` FOREIGN KEY (`idMaquinaria`) REFERENCES `maquinarias` (`id`),
  CONSTRAINT `mantenimiento_pre_maqs_idmecanico_foreign` FOREIGN KEY (`idMecanico`) REFERENCES `mecanico_internos` (`id`),
  CONSTRAINT `mantenimiento_pre_maqs_idorden_foreign` FOREIGN KEY (`idOrden`) REFERENCES `ordens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento_pre_maqs`
--

LOCK TABLES `mantenimiento_pre_maqs` WRITE;
/*!40000 ALTER TABLE `mantenimiento_pre_maqs` DISABLE KEYS */;
INSERT INTO `mantenimiento_pre_maqs` VALUES (1,2,1,1,'2017-10-27','2017-10-27','Venia la de PORTAFOLIo\r\nLas características de un jefe de proyecto\r\nPunto de equilibrio\r\nAnálisis costo beneficio\r\nAnálisis marginal','Producción owner\r\nScrum master\r\nDeveloment team\r\nQue son programas\r\nAdministración de proyecto',0,66,'2017-10-27 21:54:13','2017-10-27 21:55:07'),(2,11,1,1,'2017-11-02','2017-11-02','•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)','•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)',0,200,'2017-11-02 22:14:23','2017-11-02 22:15:32'),(3,16,2,1,'2017-11-07','2017-11-07','hv\r\nsfsd\r\nds\r\nfsfsd\r\nfsdfsd\r\nfsd\r\nfsf','',1,0,'2017-11-07 15:28:03','2017-11-07 15:28:03');
/*!40000 ALTER TABLE `mantenimiento_pre_maqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento_preventivos`
--

DROP TABLE IF EXISTS `mantenimiento_preventivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento_preventivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idOrden` int(10) unsigned NOT NULL,
  `idMecanico` int(10) unsigned NOT NULL,
  `idVehiculo` int(10) unsigned NOT NULL,
  `fechaInicioMtt` date NOT NULL,
  `fechaFinMtt` date NOT NULL,
  `observacionInicioMtt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `observacionFinalMtt` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMtt` int(11) NOT NULL DEFAULT '1',
  `gastoMP` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mantenimiento_preventivos_idorden_foreign` (`idOrden`),
  KEY `mantenimiento_preventivos_idmecanico_foreign` (`idMecanico`),
  KEY `mantenimiento_preventivos_idvehiculo_foreign` (`idVehiculo`),
  CONSTRAINT `mantenimiento_preventivos_idmecanico_foreign` FOREIGN KEY (`idMecanico`) REFERENCES `mecanico_internos` (`id`),
  CONSTRAINT `mantenimiento_preventivos_idorden_foreign` FOREIGN KEY (`idOrden`) REFERENCES `ordens` (`id`),
  CONSTRAINT `mantenimiento_preventivos_idvehiculo_foreign` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento_preventivos`
--

LOCK TABLES `mantenimiento_preventivos` WRITE;
/*!40000 ALTER TABLE `mantenimiento_preventivos` DISABLE KEYS */;
INSERT INTO `mantenimiento_preventivos` VALUES (1,1,1,1,'2017-10-27','2017-10-27','Venia la de PORTAFOLIo\r\nLas características de un jefe de proyecto\r\nPunto de equilibrio\r\nAnálisis costo beneficio\r\nAnálisis marginal','Venia la de PORTAFOLIo\r\nLas características de un jefe de proyecto\r\nPunto de equilibrio\r\nAnálisis costo beneficio\r\nAnálisis marginal',0,50,'2017-10-27 21:44:04','2017-10-27 21:44:20'),(2,6,3,1,'2017-10-29','2017-10-29','mantenimiento correspondiente','completo',0,50,'2017-10-30 02:53:59','2017-10-30 02:56:01'),(3,10,1,1,'2017-11-02','2017-11-02','•	Portada\n•	Índice\n•	Introducción\n•	Objetivos\n•	Nombre del valor/hábito\no	Definición\no	Teoría relacionada\no	Lista de acciones concretas que se deban seguir para fomentarlo\no	Ejemplos de su aplicación\no	Identificar cuál es el defecto y el exceso  (el defecto sería lo contrario del valor/hábito  y en el caso del exceso es el extremo de su aplicación)\n•	Reflexión personal sobre el valor/hábito\n•	Referencias  (Según APA 6.0)','•	Portada\r\n•	Índice\r\n•	Introducción\r\n•	Objetivos\r\n•	Nombre del valor/hábito\r\n•	Reflexión personal sobre el valor/hábito\r\n•	Referencias  (Según APA 6.0)',0,100,'2017-11-02 22:06:12','2017-11-02 22:07:50'),(4,14,2,1,'2017-11-03','2017-11-03','jskjsajsjkjsakjsjjsahduahduiahduiahuo','kl',0,50,'2017-11-04 03:33:56','2017-11-04 03:36:47'),(5,15,2,1,'2017-11-03','2017-11-03','•	Portada\n•	Índice\n•	Introducción\n•	Objetivos\n•	Nombre del valor/hábito\no	Definición\no	Teoría relacionada\no	Lista de acciones concretas que se deban seguir para fomentarlo\no	Ejemplos de su aplicación\no	Identificar cuál es el defecto y el exceso  (el defecto sería lo contrario del valor/hábito  y en el caso del exceso es el extremo de su aplicación)\n•	Reflexión personal sobre el valor/hábito','',1,0,'2017-11-04 03:36:57','2017-11-04 03:36:57');
/*!40000 ALTER TABLE `mantenimiento_preventivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maquinarias`
--

DROP TABLE IF EXISTS `maquinarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maquinarias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idTipo` int(10) unsigned NOT NULL,
  `idModelo` int(10) unsigned NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `nEquipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nInventario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaM` int(11) NOT NULL,
  `horaAux` int(11) NOT NULL DEFAULT '0',
  `semaforo` int(11) NOT NULL DEFAULT '1',
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionMaq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMaq` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maquinarias_idtipo_foreign` (`idTipo`),
  KEY `maquinarias_idmodelo_foreign` (`idModelo`),
  CONSTRAINT `maquinarias_idmodelo_foreign` FOREIGN KEY (`idModelo`) REFERENCES `modelos` (`id`),
  CONSTRAINT `maquinarias_idtipo_foreign` FOREIGN KEY (`idTipo`) REFERENCES `tipo_vmqs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maquinarias`
--

LOCK TABLES `maquinarias` WRITE;
/*!40000 ALTER TABLE `maquinarias` DISABLE KEYS */;
INSERT INTO `maquinarias` VALUES (1,2,2,'verde y amarillo',2013,'Equipo-01','AMI-AF-2222-2222-222',100,0,2,'trator.jpg','nada',1,'2017-10-27 21:40:10','2017-11-07 15:28:04'),(2,2,2,'verde y amarillo',2012,'Equipo-02','AMI-AF-3123-4566-765',100,0,4,'maquina.jpg','ninguna',1,'2017-11-02 02:15:30','2017-11-07 15:47:54');
/*!40000 ALTER TABLE `maquinarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomMarca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoMar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Toyota','Vehiculo','2017-10-27 21:37:31','2017-10-27 21:37:31'),(2,'Karter','Maquinaria','2017-10-27 21:37:45','2017-10-27 21:37:45'),(3,'Hyundai','Maquinaria','2017-10-30 01:55:46','2017-10-30 01:55:59');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mecanico_internos`
--

DROP TABLE IF EXISTS `mecanico_internos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mecanico_internos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombresMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidosMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccionMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DUI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaContrato` date NOT NULL,
  `fechaDespido` date NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMec` tinyint(1) NOT NULL DEFAULT '1',
  `observacionMec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idTaller` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mecanico_internos_idtaller_foreign` (`idTaller`),
  CONSTRAINT `mecanico_internos_idtaller_foreign` FOREIGN KEY (`idTaller`) REFERENCES `taller_es` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mecanico_internos`
--

LOCK TABLES `mecanico_internos` WRITE;
/*!40000 ALTER TABLE `mecanico_internos` DISABLE KEYS */;
INSERT INTO `mecanico_internos` VALUES (1,'David Hernandez',' ','ilobasco','M','2345-5431','0000000 ','2017-10-24','2017-10-24','2017-10-24','hola ',1,'nada ',2,'2017-10-27 21:40:38','2017-10-27 21:40:38'),(2,'Josue','Flores','ilobasco','Masculino','7253-5546','09878234-5','1990-10-03','2017-10-12','2017-10-12','mot2.jpg',1,'nada',1,'2017-10-27 21:41:32','2017-10-27 21:41:32'),(3,'Jacinto Nuñez',' ','El milán','M','2390-1634','0000000 ','2017-10-24','2017-10-24','2017-10-24','hola ',1,'nada ',3,'2017-10-30 02:45:16','2017-10-30 02:45:16');
/*!40000 ALTER TABLE `mecanico_internos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_05_17_093518_create_motoristas_table',1),(4,'2017_07_15_173455_create_marcas_table',1),(5,'2017_07_15_173520_create_modelos_table',1),(6,'2017_07_17_211826_create_tipo_vmqs_table',1),(7,'2017_07_20_113004_create_vehiculos_table',1),(8,'2017_08_03_200120_create_maquinarias_table',1),(9,'2017_08_03_221429_create_barrio_cantons_table',1),(10,'2017_08_03_225347_create_colonia_caserios_table',1),(11,'2017_08_04_000436_create_actividads_table',1),(12,'2017_08_04_133109_create_asignar_mot_vehs_table',1),(13,'2017_08_05_155558_create_vales_combustibles_table',1),(14,'2017_08_07_204804_create_asignar_mot_maqs_table',1),(15,'2017_08_09_145204_create_sa_en_vehiculos_table',1),(16,'2017_08_24_090337_create_taller_es_table',1),(17,'2017_08_25_151951_create_mecanico_internos_table',1),(18,'2017_08_25_173518_create_articulos_table',1),(19,'2017_09_09_122007_create_detalle_actividads_table',1),(20,'2017_09_11_220805_create_ordens_table',1),(21,'2017_09_11_230805_create_mantenimiento_preventivos_table',1),(22,'2017_09_18_232446_create_mantenimiento_pre_maqs_table',1),(23,'2017_10_02_222819_create_mantenimiento_correctivo_vehs_table',1),(24,'2017_10_12_225855_create_sa_en_maquinarias_table',1),(25,'2017_10_13_083910_create_sa_en_camions_table',1),(26,'2017_10_13_120354_create_mantenimiento_correctivo_maqs_table',1),(27,'2017_10_24_112335_create_bitacoras_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomModelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idMarca` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modelos_idmarca_foreign` (`idMarca`),
  CONSTRAINT `modelos_idmarca_foreign` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (1,'Hilux',1,'2017-10-27 21:37:53','2017-10-27 21:37:53'),(2,'FTR',2,'2017-10-27 21:38:02','2017-10-27 21:38:02'),(3,'Prius Hibrida',1,'2017-10-30 02:01:23','2017-10-30 02:02:01');
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motoristas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombresMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidosMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccionMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DUI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `fechaContrato` date NOT NULL,
  `fechaDespido` date NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoMot` tinyint(1) NOT NULL DEFAULT '1',
  `tipoMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionMot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motoristas`
--

LOCK TABLES `motoristas` WRITE;
/*!40000 ALTER TABLE `motoristas` DISABLE KEYS */;
INSERT INTO `motoristas` VALUES (1,'Alex','Fuentes','cojute','Masculino','2345-4321','09876543-1','1234-567865-432-1','1980-10-27','2017-10-03','2017-10-03','WIN_20170905_08_44_33_Pro.jpg',1,'Operario','ninguna','2017-10-27 21:35:59','2017-10-30 01:53:00'),(2,'Jose ','Alas','Ilobasco','Masculino','7642-4424','09877898-7','0000-000000-000-0','1990-10-03','2017-10-13','2017-10-13','mot2.jpg',1,'Operario','ninguna','2017-10-27 21:37:15','2017-11-02 03:35:22'),(3,'Anibal','Soriano','San Vicente','Masculino','7891-0232','09812345-6','2345-665432-123-4','1990-10-04','2017-10-06','2017-10-06','mot.jpg',1,'Motorista','ninguna','2017-10-30 01:42:47','2017-10-30 01:42:47');
/*!40000 ALTER TABLE `motoristas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordens`
--

DROP TABLE IF EXISTS `ordens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nOrden` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordens`
--

LOCK TABLES `ordens` WRITE;
/*!40000 ALTER TABLE `ordens` DISABLE KEYS */;
INSERT INTO `ordens` VALUES (1,1,'2017-10-27 21:44:04','2017-10-27 21:44:04'),(2,2,'2017-10-27 21:54:13','2017-10-27 21:54:13'),(3,3,'2017-10-27 22:03:52','2017-10-27 22:03:52'),(4,4,'2017-10-27 22:08:58','2017-10-27 22:08:58'),(5,5,'2017-10-27 22:14:14','2017-10-27 22:14:14'),(6,6,'2017-10-30 02:53:59','2017-10-30 02:53:59'),(7,7,'2017-10-30 03:08:56','2017-10-30 03:08:56'),(8,8,'2017-11-02 22:02:21','2017-11-02 22:02:21'),(9,9,'2017-11-02 22:04:22','2017-11-02 22:04:22'),(10,10,'2017-11-02 22:06:12','2017-11-02 22:06:12'),(11,11,'2017-11-02 22:14:23','2017-11-02 22:14:23'),(12,12,'2017-11-02 22:22:34','2017-11-02 22:22:34'),(13,13,'2017-11-02 22:32:54','2017-11-02 22:32:54'),(14,14,'2017-11-04 03:33:56','2017-11-04 03:33:56'),(15,15,'2017-11-04 03:36:56','2017-11-04 03:36:56'),(16,16,'2017-11-07 15:28:03','2017-11-07 15:28:03'),(17,17,'2017-11-07 15:47:54','2017-11-07 15:47:54'),(18,18,'2017-11-07 15:57:14','2017-11-07 15:57:14');
/*!40000 ALTER TABLE `ordens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_en_camions`
--

DROP TABLE IF EXISTS `sa_en_camions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_en_camions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idAsignacion` int(10) unsigned NOT NULL,
  `idVale` int(10) unsigned NOT NULL,
  `idCC` int(10) unsigned NOT NULL,
  `idActividad` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `kilometrajeS` double NOT NULL,
  `kilometrajeE` double NOT NULL DEFAULT '0',
  `tanqueS` int(11) NOT NULL,
  `tanqueE` int(11) NOT NULL DEFAULT '0',
  `horaSalida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaEntrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `observacionS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nViajes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaExtra` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `estadoC` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sa_en_camions_idasignacion_foreign` (`idAsignacion`),
  KEY `sa_en_camions_idvale_foreign` (`idVale`),
  KEY `sa_en_camions_idcc_foreign` (`idCC`),
  KEY `sa_en_camions_idactividad_foreign` (`idActividad`),
  CONSTRAINT `sa_en_camions_idactividad_foreign` FOREIGN KEY (`idActividad`) REFERENCES `actividads` (`id`),
  CONSTRAINT `sa_en_camions_idasignacion_foreign` FOREIGN KEY (`idAsignacion`) REFERENCES `asignar_mot_vehs` (`id`),
  CONSTRAINT `sa_en_camions_idcc_foreign` FOREIGN KEY (`idCC`) REFERENCES `barrio_cantons` (`id`),
  CONSTRAINT `sa_en_camions_idvale_foreign` FOREIGN KEY (`idVale`) REFERENCES `vales_combustibles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_en_camions`
--

LOCK TABLES `sa_en_camions` WRITE;
/*!40000 ALTER TABLE `sa_en_camions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_en_camions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_en_maquinarias`
--

DROP TABLE IF EXISTS `sa_en_maquinarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_en_maquinarias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idAsignacion` int(10) unsigned NOT NULL,
  `idVale` int(10) unsigned NOT NULL,
  `idActividad` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `horasM` int(11) NOT NULL,
  `tanqueS` int(11) NOT NULL,
  `tanqueE` int(11) NOT NULL DEFAULT '0',
  `horaSalida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaEntrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `observacionS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipoSalida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaExtra` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sa_en_maquinarias_idasignacion_foreign` (`idAsignacion`),
  KEY `sa_en_maquinarias_idvale_foreign` (`idVale`),
  KEY `sa_en_maquinarias_idactividad_foreign` (`idActividad`),
  CONSTRAINT `sa_en_maquinarias_idactividad_foreign` FOREIGN KEY (`idActividad`) REFERENCES `actividads` (`id`),
  CONSTRAINT `sa_en_maquinarias_idasignacion_foreign` FOREIGN KEY (`idAsignacion`) REFERENCES `asignar_mot_maqs` (`id`),
  CONSTRAINT `sa_en_maquinarias_idvale_foreign` FOREIGN KEY (`idVale`) REFERENCES `vales_combustibles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_en_maquinarias`
--

LOCK TABLES `sa_en_maquinarias` WRITE;
/*!40000 ALTER TABLE `sa_en_maquinarias` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_en_maquinarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sa_en_vehiculos`
--

DROP TABLE IF EXISTS `sa_en_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sa_en_vehiculos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idAsignacion` int(10) unsigned NOT NULL,
  `idVale` int(10) unsigned NOT NULL,
  `idActividad` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `kilometrajeS` double NOT NULL,
  `kilometrajeE` double NOT NULL DEFAULT '0',
  `tanqueS` int(11) NOT NULL,
  `tanqueE` int(11) NOT NULL DEFAULT '0',
  `horaSalida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horaEntrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `observacionS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacionE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lugarCarga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sa_en_vehiculos_idasignacion_foreign` (`idAsignacion`),
  KEY `sa_en_vehiculos_idvale_foreign` (`idVale`),
  KEY `sa_en_vehiculos_idactividad_foreign` (`idActividad`),
  CONSTRAINT `sa_en_vehiculos_idactividad_foreign` FOREIGN KEY (`idActividad`) REFERENCES `actividads` (`id`),
  CONSTRAINT `sa_en_vehiculos_idasignacion_foreign` FOREIGN KEY (`idAsignacion`) REFERENCES `asignar_mot_vehs` (`id`),
  CONSTRAINT `sa_en_vehiculos_idvale_foreign` FOREIGN KEY (`idVale`) REFERENCES `vales_combustibles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sa_en_vehiculos`
--

LOCK TABLES `sa_en_vehiculos` WRITE;
/*!40000 ALTER TABLE `sa_en_vehiculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_en_vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taller_es`
--

DROP TABLE IF EXISTS `taller_es`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taller_es` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomTallerE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccionTE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoTE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoTE` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taller_es`
--

LOCK TABLES `taller_es` WRITE;
/*!40000 ALTER TABLE `taller_es` DISABLE KEYS */;
INSERT INTO `taller_es` VALUES (1,'Taller Municipal','Oscar Martinez','final 8va avenida sur','2384-4682',1,'2017-10-24 06:00:00','2015-10-24 06:00:00'),(2,'Taller Hernandez','David Hernandez','ilobasco','2345-5431',1,'2017-10-27 21:40:38','2017-10-27 21:40:38'),(3,'Taller Nuñez','Jacinto Nuñez','El milán','2390-1639',1,'2017-10-30 02:45:16','2017-10-30 02:45:40');
/*!40000 ALTER TABLE `taller_es` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_vmqs`
--

DROP TABLE IF EXISTS `tipo_vmqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_vmqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TipoVM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TipoVM2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_vmqs`
--

LOCK TABLES `tipo_vmqs` WRITE;
/*!40000 ALTER TABLE `tipo_vmqs` DISABLE KEYS */;
INSERT INTO `tipo_vmqs` VALUES (1,'Pikup','Vehiculo','2017-10-27 21:38:14','2017-10-27 21:38:14'),(2,'Cargadora','Maquinaria','2017-10-27 21:38:30','2017-10-30 01:37:55'),(3,'Camion de volteo','Vehiculo','2017-10-30 01:29:55','2017-10-30 01:29:55');
/*!40000 ALTER TABLE `tipo_vmqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estadoUsu` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Saic','salvadorcrespin@hotmail.com','$2y$10$dS2P7sqknBWxSxtNM0KhH.gl4a0PEgXX1LaTvuUT/25jCn3y2idQ6',1,'ylctD4V5zzKQBX2yygsdlh248gFiezSZNVCMayqfSq0cVfJRJTL0MBMxEjsE','2017-10-27 21:35:12','2017-11-02 01:43:57'),(2,'Admin','saic219@gmail.com','$2y$10$t.LceGvOEke92qPhJgq/rej7x5Nxy8axou1LjRIuthPEMeND/zUSO',1,'o3aMHubbhdEd6qnlNE2fr30GKc37ZjaX6zv25LzennKv27ZXdLfO7rLkmPWW','2017-10-30 03:27:53','2017-10-30 17:21:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vales_combustibles`
--

DROP TABLE IF EXISTS `vales_combustibles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vales_combustibles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nVale` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Diesel',
  `galones` double NOT NULL DEFAULT '0',
  `PrecioU` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `estadoVale` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vales_combustibles`
--

LOCK TABLES `vales_combustibles` WRITE;
/*!40000 ALTER TABLE `vales_combustibles` DISABLE KEYS */;
/*!40000 ALTER TABLE `vales_combustibles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idTipo` int(10) unsigned NOT NULL,
  `idModelo` int(10) unsigned NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `nPlaca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nInventario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kilometraje` double NOT NULL,
  `kilometrajeAux` double NOT NULL DEFAULT '0',
  `kilometrajeM` double NOT NULL,
  `nombre_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ObservacionVeh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `semaforo` int(11) NOT NULL DEFAULT '1',
  `estadoVeh` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehiculos_idtipo_foreign` (`idTipo`),
  KEY `vehiculos_idmodelo_foreign` (`idModelo`),
  CONSTRAINT `vehiculos_idmodelo_foreign` FOREIGN KEY (`idModelo`) REFERENCES `modelos` (`id`),
  CONSTRAINT `vehiculos_idtipo_foreign` FOREIGN KEY (`idTipo`) REFERENCES `tipo_vmqs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,1,1,'Blanco',2012,'N-1234','AMI-AF-1111-1111-111',6000,0,6000,'misu.jpg','ninguna',2,1,'2017-10-27 21:39:19','2017-11-04 03:36:57'),(2,3,3,'rojo',2010,'C-12345','AMI-AF-2222-3333-333',2000,0,3000,'cam.jpg','ninguna',4,1,'2017-11-07 15:56:38','2017-11-07 15:57:15');
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-07 11:38:31
