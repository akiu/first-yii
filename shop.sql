-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: yii2basic2
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.10.1

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
-- Table structure for table `table_admin`
--

DROP TABLE IF EXISTS `table_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_admin` (
  `admin_id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(255) NOT NULL,
  `admin_hash_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_admin`
--

LOCK TABLES `table_admin` WRITE;
/*!40000 ALTER TABLE `table_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_bank`
--

DROP TABLE IF EXISTS `table_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_bank` (
  `bank_id` int(255) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `bank_acount_name` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_bank`
--

LOCK TABLES `table_bank` WRITE;
/*!40000 ALTER TABLE `table_bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_category`
--

DROP TABLE IF EXISTS `table_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_category` (
  `category_id` int(255) NOT NULL DEFAULT '0',
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_category`
--

LOCK TABLES `table_category` WRITE;
/*!40000 ALTER TABLE `table_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_order`
--

DROP TABLE IF EXISTS `table_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_order` (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `order_created_date` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`,`product_id`,`product_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_order`
--

LOCK TABLES `table_order` WRITE;
/*!40000 ALTER TABLE `table_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_product`
--

DROP TABLE IF EXISTS `table_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_product` (
  `product_id` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_main_picture` varchar(255) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_created_date` date NOT NULL,
  `admin_id` int(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category` (`product_category`,`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_product`
--

LOCK TABLES `table_product` WRITE;
/*!40000 ALTER TABLE `table_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_purchase`
--

DROP TABLE IF EXISTS `table_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_purchase` (
  `purchase_id` int(255) NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `purchase_note` varchar(255) NOT NULL,
  `purchase_user_address` varchar(255) NOT NULL,
  `purchase_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_purchase`
--

LOCK TABLES `table_purchase` WRITE;
/*!40000 ALTER TABLE `table_purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_hash_password` varchar(255) NOT NULL,
  `user_created_date` date NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_post_code` varchar(255) NOT NULL,
  `user_mobile_number` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-08 19:09:53
