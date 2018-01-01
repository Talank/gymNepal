-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: gymnepal
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ram','ram123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `clock` varchar(2) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (5,5,'2017-11-19','01:00:47','am'),(14,8,'2017-11-19','07:30:05','pm'),(16,5,'2017-11-20','10:03:07','am'),(18,8,'2017-11-20','08:18:44','pm'),(19,7,'2017-11-20','09:53:09','pm'),(20,6,'2017-11-20','09:57:41','pm'),(26,11,'2017-11-21','11:47:40','am'),(36,2,'2017-11-22','12:55:03','pm'),(37,14,'2017-11-22','01:04:25','pm'),(38,11,'2017-11-22','01:12:23','pm'),(40,1,'2017-11-22','01:14:29','pm'),(41,3,'2017-11-22','01:25:01','pm'),(42,3,'2017-11-22','01:30:54','pm'),(43,4,'2017-11-22','06:10:09','pm'),(44,14,'2017-11-23','07:04:01','pm'),(45,14,'2017-11-23','07:04:11','pm'),(46,4,'2017-11-23','07:06:31','pm'),(47,4,'2017-11-23','07:40:48','pm'),(48,4,'2017-11-23','07:47:12','pm'),(49,2,'2017-11-24','07:23:18','pm'),(50,18,'2017-11-24','07:25:00','pm'),(51,1,'2017-11-25','11:42:59','am'),(52,2,'2017-11-25','01:27:14','pm'),(53,2,'2017-11-25','01:27:29','pm'),(54,18,'2017-11-25','01:29:01','pm'),(55,20,'2017-11-25','01:39:16','pm'),(56,18,'2017-11-26','08:08:30','am'),(57,2,'2017-11-26','08:13:26','am'),(58,20,'2017-11-26','08:13:30','am'),(59,22,'2017-11-26','08:37:45','am'),(60,3,'2017-11-26','09:12:39','am'),(61,2,'2017-11-26','11:50:19','am'),(62,20,'2017-11-26','11:50:22','am');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duebalance`
--

DROP TABLE IF EXISTS `duebalance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duebalance` (
  `user_id` int(11) NOT NULL,
  `due` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duebalance`
--

LOCK TABLES `duebalance` WRITE;
/*!40000 ALTER TABLE `duebalance` DISABLE KEYS */;
INSERT INTO `duebalance` VALUES (1,300),(6,500);
/*!40000 ALTER TABLE `duebalance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `information`
--

DROP TABLE IF EXISTS `information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `information` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `temporay_address` varchar(16) NOT NULL,
  `permant_address` varchar(16) NOT NULL,
  `occupation` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `information`
--

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
INSERT INTO `information` VALUES (1,9814145742,'1995-06-28','simalchour','simalchour','student'),(2,9806627492,'1997-06-28','bagar','bagar','student'),(3,9804147895,'1995-06-14','lakeside','mahendrapool','model'),(4,9814145741,'1995-06-28','simpani','simpani','student'),(5,9811422244,'2000-10-14','bagar','hospital chowk','student'),(6,9814145741,'0000-00-00','harichowk','lakeside','software engine'),(7,9845657895,'1997-12-10','lakeside','lakeside','driver'),(8,9814512333,'1998-10-12','lamachaur','lamachaur','student'),(9,9814512333,'2010-10-12','bagar','bagar','student'),(10,9814541233,'2010-10-12','bagar','bagar','condoctor'),(11,9814512333,'1997-12-13','miruwa','miruwa','student'),(12,9846078945,'2000-12-14','bagar','bagar','student'),(13,9814178955,'1996-07-02','bagar','bandipur','student'),(14,9814186207,'1997-12-13','bagar','nepalgunj','student'),(15,9811222212,'1997-12-14','lakeside','lakeside','student'),(16,9814646455,'2000-12-14','nayabazar','bagar','nurse'),(17,9846575895,'1990-09-14','bagar','bagar','businessman'),(18,9814512222,'1990-12-12','bagar','bagar','student'),(19,9814512133,'1997-10-12','bagar','bagar','model'),(20,9814156778,'1997-12-23','bagar','bagar','shopkeeper'),(21,9815211222,'1997-10-02','milanchowk','dhampus','student'),(22,9814522122,'2000-10-12','bagar','bagar','student'),(29,9869328009,'0000-00-00','dharan','lamjung','Computer engine');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending`
--

DROP TABLE IF EXISTS `pending`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending` (
  `user_id` int(11) NOT NULL,
  `duration` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending`
--

LOCK TABLES `pending` WRITE;
/*!40000 ALTER TABLE `pending` DISABLE KEYS */;
INSERT INTO `pending` VALUES (1,199,'2017-11-25');
/*!40000 ALTER TABLE `pending` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,0),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `duedate` date NOT NULL,
  `issue_date` date NOT NULL,
  `picture` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Anil','Baral','2018-06-12','2017-11-18','talank.jpg'),(2,'Ashish','Shrestha','2018-06-24','2017-11-18','acoustic.png'),(3,'Gigi ','Shrestha','2018-05-16','2017-11-18','11.jpg'),(4,'Siddharthaa','katel','2018-03-08','2017-11-07','dandibiyo.jpg'),(5,'Anchal','Gurung','2019-06-25','2017-11-18','hqdefault.jpg'),(6,'Prajwal','Adk','2018-04-22','2017-11-19','elton.jpg'),(7,'Prajwal','ghimire','2018-05-02','2017-11-07','hqdefault.jpg'),(8,'Rajesh','Timislina','2018-04-02','2017-11-19','india.png'),(9,'Raju','Bk','2018-01-25','2017-11-15','hqdefault.jpg'),(10,'Anchal','Aryal','2018-01-08','2017-11-19','hqdefault.jpg'),(11,'Ashish','Parajuli','2018-05-12','2017-11-19','dandibiyo.jpg'),(12,'Prashant','tamrakar','2018-01-13','2017-11-20','guitar.png'),(13,'Suraj','Shrestha','2018-01-21','2017-11-21','Screenshot (3).png'),(14,'Ujwal','Mahato','2018-03-18','2017-11-22','WIN_20171122_09_18_13_Pro.jpg'),(15,'Kamla','Devkota','2017-12-23','2017-11-23','lake1.jpg'),(16,'Rasmita','Udas','2018-02-23','2017-11-23','india.png'),(17,'Rajkumar','Rauth','2017-12-24','2017-11-23','101910672-IMG_9572.530x298.jpg'),(18,'Bivek','Shrestha','2018-02-24','2017-11-24','WIN_20171124_10_42_42_Pro.jpg'),(19,'Malika','Mahato','2018-02-24','2017-11-24','WIN_20171122_09_18_13_Pro.jpg'),(20,'Buddha','Shrestha','2018-05-25','2017-11-25','IMG_20171018_190725_006.jpg'),(21,'Harry','jennet','2018-03-26','2017-11-26','image1.jpg'),(22,'Kate','Winslet','2018-01-07','2017-11-26',''),(29,'susan','thapa','2017-12-08','2017-12-07','baral.PNG');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-21 14:36:12
