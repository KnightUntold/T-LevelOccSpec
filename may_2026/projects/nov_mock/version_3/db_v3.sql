-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: rolsadb
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit` (
  `audit_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `code` text NOT NULL,
  `long_desc` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`audit_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit`
--

LOCK TABLES `audit` WRITE;
/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
INSERT INTO `audit` VALUES (1,6,'New user registered','reg','2025-11-21'),(2,3,'User has successfully logged out','log','2025-11-21'),(3,3,'User has successfully logged out','log','2025-11-21'),(4,6,'User has successfully logged out','log','2025-11-21'),(5,3,'User has successfully logged out','log','2025-11-21'),(6,3,'User has successfully logged out','log','2025-11-21'),(7,6,'User has successfully logged out','log','2025-11-21'),(8,3,'User has successfully logged out','log','2025-11-21'),(9,5,'User has booked an appointment','apt','2025-11-21'),(10,3,'User has booked an appointment','apt','2025-11-25'),(11,3,'User has changed appointment','apt','2025-11-25'),(12,3,'User has changed appointment','apt','2025-11-25'),(13,3,'User has changed appointment','apt','2025-11-25'),(14,3,'User has successfully cancelled appointment.','apt','2025-11-25'),(15,3,'User has successfully logged out','log','2025-11-25'),(16,7,'New user registered','reg','2025-11-25'),(17,7,'User has booked an appointment','apt','2025-11-25'),(18,7,'User has booked an appointment','apt','2025-11-25'),(19,7,'User has changed appointment','apt','2025-11-25'),(20,7,'User has successfully cancelled appointment.','apt','2025-11-25'),(21,7,'User has successfully logged out','log','2025-11-25'),(22,3,'User has booked an appointment','apt','2025-11-25'),(23,3,'User has changed appointment','apt','2025-11-25'),(24,3,'User has successfully logged out','log','2025-11-25'),(25,3,'User has changed appointment','apt','2025-11-25'),(26,3,'User has changed appointment','apt','2025-11-25'),(27,3,'User has successfully logged out','log','2025-11-25'),(28,3,'User has changed appointment','apt','2025-11-25'),(29,3,'User has changed appointment','apt','2025-11-25');
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking_options`
--

DROP TABLE IF EXISTS `booking_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_options` (
  `opt_id` int NOT NULL AUTO_INCREMENT,
  `option_name` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_options`
--

LOCK TABLES `booking_options` WRITE;
/*!40000 ALTER TABLE `booking_options` DISABLE KEYS */;
INSERT INTO `booking_options` VALUES (1,'Solar Panels','con'),(2,'Smart Home Energy Management','con'),(3,'Electric Car charger','con'),(4,'Solar panels','ins'),(5,'Smart Home energy management','ins'),(6,'Electric Car charger','ins');
/*!40000 ALTER TABLE `booking_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_book`
--

DROP TABLE IF EXISTS `customer_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_book` (
  `link_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `opt_id` int NOT NULL,
  `epoch_app_date` text NOT NULL,
  `link_date` date NOT NULL,
  PRIMARY KEY (`link_id`),
  KEY `user_id` (`user_id`,`opt_id`),
  KEY `opt_id` (`opt_id`),
  CONSTRAINT `customer_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_book`
--

LOCK TABLES `customer_book` WRITE;
/*!40000 ALTER TABLE `customer_book` DISABLE KEYS */;
INSERT INTO `customer_book` VALUES (3,5,1,'1762963620','2025-11-21'),(6,7,2,'1762437300','2025-11-25'),(7,3,2,'1762362840','2025-11-25');
/*!40000 ALTER TABLE `customer_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `sign_up_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'summer','wall','fdgsdfgdfg@fhdggsf.copm','','$2y$10$jW7JpQUbHX48Rhli817hQ.4XzDa7lFbP7148RhX1GMa5mO.6cb9d2','2025-11-18'),(2,'test','test','test@test.com','','$2y$10$pX83jYNrbqESi3VEgL0BOuRq0R5RI86/u0.ITLgV7uuTnzsuSw9Xm','2025-11-18'),(3,'sam','sam','sam@sam.com','1 sam street LS 54M','$2y$10$WUqvlDWgl71zBntJEfb6mOaRgz.oy1zVXCP4I/U/n3EA7M00T24zq','2025-11-20'),(4,'jam','jam','jam@jam.com','1 jam street LS J4M','$2y$10$1zYO5hjGWwb/4vJNtl0NKOeKY4GV7Vbbt2Hq2Sa6RKj90M.IYaE7G','2025-11-21'),(5,'bam','bam','bam@bam.com','1 bam street LS 84M','$2y$10$oy0S.P0FB0pm3UBHKqpiWupNkcghJC1u3fh8CVaStR9nhKl2kVnGG','2025-11-21'),(6,'zam','zam','zam@zam.com','1 zam street LS Z4M','$2y$10$zsIk88jY3RMJsSsh73htnefmygWHhNawzHG861KooIsD.7kpRePU.','2025-11-21'),(7,'fam','fam','fam@fam.com','1 fam street LS F4M','$2y$10$7EBW2cUugkaT2PFJmUSWyuQFT6MgjeXbJG6X7ErDRDTOZA/HfDVyO','2025-11-25');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-25 14:26:05
