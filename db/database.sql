-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: lamp
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'France','Canet','19 rue du muguet'),(2,'France','Cabestany','21 rue de la rose'),(3,'Allemagne','Berlin','30 rue de la fleur'),(4,'Suisse','Geneve','71 rue du picenlit'),(27,'Belgique','Bruxelle','37 rue du lilla'),(28,'Autriche','Vienne','27 rue de la paix');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` VALUES (1,'Télévision'),(2,'Wifi'),(3,'Brosse a dent'),(4,'Piscine'),(5,'Papier toilette');
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_equipments`
--

DROP TABLE IF EXISTS `link_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `link_equipments` (
  `room_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`,`equipment_id`),
  KEY `links_equipments_equipments_id_fk` (`equipment_id`),
  CONSTRAINT `links_equipments_equipments_id_fk` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`),
  CONSTRAINT `links_equipments_room_id_fk` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_equipments`
--

LOCK TABLES `link_equipments` WRITE;
/*!40000 ALTER TABLE `link_equipments` DISABLE KEYS */;
INSERT INTO `link_equipments` VALUES (1,1),(2,1),(3,1),(29,1),(1,2),(2,2),(4,2),(29,2),(2,3),(4,3),(29,3),(1,4),(3,4),(4,4),(29,4),(3,5),(4,5),(29,5);
/*!40000 ALTER TABLE `link_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rents`
--

DROP TABLE IF EXISTS `rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rents_user_id_fk` (`user_id`),
  KEY `rents_room_id_fk` (`room_id`),
  CONSTRAINT `rents_room_id_fk` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  CONSTRAINT `rents_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rents`
--

LOCK TABLES `rents` WRITE;
/*!40000 ALTER TABLE `rents` DISABLE KEYS */;
INSERT INTO `rents` VALUES (1,'2022-05-17','2022-05-29',2,1),(2,'2022-05-17','2022-05-29',3,2),(3,'2022-05-17','2022-05-29',4,3),(4,'2022-05-17','2022-05-29',5,4),(5,'2022-06-15','2022-06-27',2,2),(6,'2022-06-15','2022-06-27',3,1),(7,'2022-06-23','2022-06-30',5,2),(8,'2022-06-09','2022-06-30',6,3),(9,'2022-06-07','2022-06-27',5,4),(10,'2022-06-13','2022-06-15',4,1);
/*!40000 ALTER TABLE `rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_pics` varchar(255) NOT NULL DEFAULT '',
  `room_type` int(1) NOT NULL,
  `surface` int(4) NOT NULL,
  `description` text,
  `nb_sleep` int(2) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_published` int(1) NOT NULL DEFAULT '1',
  `dispo_from` date DEFAULT NULL,
  `dispo_to` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_user_id_fk` (`owner_id`),
  KEY `room_addresses_id_fk` (`address_id`),
  CONSTRAINT `room_addresses_id_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `room_user_id_fk` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'chemin1',1,110,'Villa tranquille',3,89.00,1,1,1,'2022-06-01','2022-08-31'),(2,'chemin2',2,25,'Petite chambre',2,29.00,1,2,1,'2022-06-01','2022-08-31'),(3,'chemin3',3,60,'Dortoire commun',5,59.00,1,3,1,'2022-06-01','2022-08-31'),(4,'chemin4',1,150,'Villa grande',2,119.00,1,4,1,'2022-06-01','2022-08-31'),(29,'chemin5',1,210,'Somptueux manoir ',3,199.00,1,27,1,'2022-06-01','2022-08-31');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'julien','julien','julien@toto.com','2'),(2,'juice','juice','juice@toto.com','1'),(3,'jean','jean','jean@toto.com','1'),(4,'jeanne','jeanne','jeanne@toto.com','1'),(5,'emile','emile','emile@toto.com','1'),(6,'simon','simon','simon@toto.com','2'),(7,'sabine','sabine','sabine@toto.com','1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-04 16:01:40
