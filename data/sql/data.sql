-- MySQL dump 10.13  Distrib 5.5.23, for Linux (x86_64)
--
-- Host: localhost    Database: zmijevik_inmateemail
-- ------------------------------------------------------
-- Server version	5.5.23-55

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
-- Table structure for table `audit_logger`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_logger` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `module` varchar(96) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(96) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `params` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `audit_logger_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logger`
--

LOCK TABLES `audit_logger` WRITE;
/*!40000 ALTER TABLE `audit_logger` DISABLE KEYS */;
INSERT INTO `audit_logger` (`id`, `user_id`, `module`, `action`, `object_id`, `params`, `created_at`, `updated_at`) VALUES (1,1,'inmate','create',NULL,'a:2:{s:6:\"inmate\";a:6:{s:2:\"id\";s:0:\"\";s:12:\"email_number\";s:8:\"10293847\";s:11:\"jail_number\";s:8:\"10293847\";s:7:\"balance\";s:5:\"20.00\";s:19:\"contacts_approvable\";s:2:\"on\";s:4:\"User\";a:9:{s:10:\"first_name\";s:6:\"Joseph\";s:11:\"middle_name\";s:0:\"\";s:9:\"last_name\";s:6:\"Persie\";s:6:\"prefix\";s:0:\"\";s:6:\"suffix\";s:0:\"\";s:8:\"username\";s:8:\"10293847\";s:8:\"password\";s:4:\"fart\";s:14:\"password_again\";s:4:\"fart\";s:2:\"id\";s:0:\"\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 08:57:15','2013-02-21 08:57:15'),(2,1,'flag','create',NULL,'a:2:{s:4:\"flag\";a:4:{s:2:\"id\";s:0:\"\";s:4:\"name\";s:9:\"profanity\";s:11:\"description\";s:81:\"all profane language not necessarily of any particular threat of malicious intent\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:28','2013-02-21 09:22:28'),(3,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"1\";s:4:\"name\";s:4:\"fuck\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:48','2013-02-21 09:22:48'),(4,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"1\";s:4:\"name\";s:4:\"shit\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:51','2013-02-21 09:22:51'),(5,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"1\";s:4:\"name\";s:4:\"piss\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:54','2013-02-21 09:22:54'),(6,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"1\";s:4:\"name\";s:3:\"ass\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:57','2013-02-21 09:22:57'),(7,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"1\";s:4:\"name\";s:4:\"cunt\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 09:22:59','2013-02-21 09:22:59'),(8,1,'officer','create',NULL,'a:2:{s:7:\"officer\";a:3:{s:2:\"id\";s:0:\"\";s:12:\"badge_number\";s:8:\"12334566\";s:4:\"User\";a:12:{s:10:\"first_name\";s:3:\"sgt\";s:11:\"middle_name\";s:0:\"\";s:9:\"last_name\";s:5:\"baker\";s:6:\"prefix\";s:0:\"\";s:6:\"suffix\";s:0:\"\";s:13:\"email_address\";s:0:\"\";s:8:\"username\";s:8:\"sgtbaker\";s:8:\"password\";s:8:\"sgtbaker\";s:14:\"password_again\";s:8:\"sgtbaker\";s:9:\"is_active\";s:2:\"on\";s:14:\"is_super_admin\";s:2:\"on\";s:2:\"id\";s:0:\"\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 11:18:53','2013-02-21 11:18:53'),(9,3,'contact','create',NULL,'a:2:{s:7:\"contact\";a:7:{s:2:\"id\";s:0:\"\";s:13:\"email_address\";s:19:\"cstraka@hotmail.com\";s:10:\"first_name\";s:5:\"Chris\";s:9:\"last_name\";s:6:\"Straka\";s:12:\"phone_number\";s:10:\"1232343456\";s:11:\"is_approved\";s:2:\"on\";s:11:\"inmate_list\";a:1:{i:0;s:1:\"1\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-21 11:19:48','2013-02-21 11:19:48'),(10,2,'email_incoming','create',NULL,'a:2:{s:14:\"email_incoming\";a:4:{s:2:\"id\";s:0:\"\";s:12:\"sender_email\";s:19:\"drake22@husmail.com\";s:18:\"date_inmate_viewed\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:5:\"Email\";a:7:{s:10:\"email_type\";s:8:\"incoming\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:0:\"\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:0:\"\";s:7:\"message\";s:0:\"\";s:2:\"id\";s:0:\"\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-22 17:33:51','2013-02-22 17:33:51'),(11,2,'email_incoming','create',NULL,'a:2:{s:14:\"email_incoming\";a:4:{s:2:\"id\";s:0:\"\";s:12:\"sender_email\";s:19:\"drake22@husmail.com\";s:18:\"date_inmate_viewed\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:5:\"Email\";a:7:{s:10:\"email_type\";s:8:\"incoming\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:0:\"\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:10:\"commercary\";s:7:\"message\";s:47:\"we comeing to visit and provide some commercary\";s:2:\"id\";s:0:\"\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-22 17:34:31','2013-02-22 17:34:31'),(12,1,'inmate','create',NULL,'a:2:{s:6:\"inmate\";a:5:{s:2:\"id\";s:0:\"\";s:12:\"email_number\";s:8:\"43247329\";s:11:\"jail_number\";s:8:\"43247329\";s:7:\"balance\";s:5:\"$5.00\";s:4:\"User\";a:9:{s:10:\"first_name\";s:3:\"Tim\";s:11:\"middle_name\";s:6:\"Parker\";s:9:\"last_name\";s:0:\"\";s:6:\"prefix\";s:0:\"\";s:6:\"suffix\";s:0:\"\";s:8:\"username\";s:8:\"43247329\";s:8:\"password\";s:4:\"test\";s:14:\"password_again\";s:4:\"test\";s:2:\"id\";s:0:\"\";}}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-02-22 23:34:10','2013-02-22 23:34:10'),(13,1,'config','create',NULL,'a:2:{s:6:\"config\";a:5:{s:2:\"id\";s:0:\"\";s:5:\"title\";s:16:\"Send email price\";s:11:\"description\";s:37:\"the current rate for sending an email\";s:10:\"config_key\";s:16:\"send_email_price\";s:12:\"config_value\";s:4:\"1.25\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:00:28','2013-03-12 23:00:28'),(14,1,'config','create',NULL,'a:2:{s:6:\"config\";a:5:{s:2:\"id\";s:0:\"\";s:5:\"title\";s:19:\"Receive email price\";s:11:\"description\";s:40:\"the current price for receiving an email\";s:10:\"config_key\";s:19:\"receive_email_price\";s:12:\"config_value\";s:4:\"1.25\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:01:03','2013-03-12 23:01:03'),(15,1,'flag','create',NULL,'a:2:{s:4:\"flag\";a:6:{s:2:\"id\";s:0:\"\";s:4:\"name\";s:8:\"violence\";s:11:\"description\";s:0:\"\";s:5:\"color\";s:6:\"orange\";s:8:\"cssClass\";s:13:\"flag_violence\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:06:11','2013-03-12 23:06:11'),(16,1,'flag','update',1,'a:1:{s:4:\"flag\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:9:\"profanity\";s:11:\"description\";s:81:\"all profane language not necessarily of any particular threat of malicious intent\";s:5:\"color\";s:3:\"red\";s:8:\"cssClass\";s:12:\"flag_profane\";s:6:\"weight\";s:1:\"0\";}}','2013-03-12 23:06:47','2013-03-12 23:06:47'),(17,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"2\";s:4:\"name\";s:4:\"kill\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:08:01','2013-03-12 23:08:01'),(18,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"2\";s:4:\"name\";s:5:\"punch\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:08:10','2013-03-12 23:08:10'),(19,1,'keyword','create',NULL,'a:2:{s:7:\"keyword\";a:5:{s:2:\"id\";s:0:\"\";s:7:\"flag_id\";s:1:\"2\";s:4:\"name\";s:4:\"stab\";s:11:\"description\";s:0:\"\";s:6:\"weight\";s:1:\"0\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:08:16','2013-03-12 23:08:16'),(20,1,'contact','create',NULL,'a:2:{s:7:\"contact\";a:5:{s:2:\"id\";s:0:\"\";s:13:\"email_address\";s:20:\"zmijevik@hotmail.com\";s:10:\"first_name\";s:6:\"Joseph\";s:9:\"last_name\";s:6:\"Persie\";s:12:\"phone_number\";s:10:\"2343345456\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-12 23:42:01','2013-03-12 23:42:01'),(21,1,'config','create',NULL,'a:2:{s:6:\"config\";a:5:{s:2:\"id\";s:0:\"\";s:5:\"title\";s:13:\"IMAP Username\";s:11:\"description\";s:0:\"\";s:10:\"config_key\";s:13:\"imap_username\";s:12:\"config_value\";s:37:\"inmateemail@supraliminalsolutions.com\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-13 00:07:31','2013-03-13 00:07:31'),(22,1,'config','create',NULL,'a:2:{s:6:\"config\";a:5:{s:2:\"id\";s:0:\"\";s:5:\"title\";s:13:\"IMAP Password\";s:11:\"description\";s:0:\"\";s:10:\"config_key\";s:13:\"imap_password\";s:12:\"config_value\";s:10:\"a1genda666\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-13 00:08:06','2013-03-13 00:08:06'),(23,1,'config','create',NULL,'a:2:{s:6:\"config\";a:5:{s:2:\"id\";s:0:\"\";s:5:\"title\";s:15:\"IMAP Connection\";s:11:\"description\";s:0:\"\";s:10:\"config_key\";s:15:\"imap_connection\";s:12:\"config_value\";s:66:\"{mail.supraliminalsolutions.com:993/imap/novalidate-cert/ssl}INBOX\";}s:13:\"_save_and_add\";s:12:\"Save and add\";}','2013-03-13 00:08:35','2013-03-13 00:08:35'),(24,1,'email_incoming','update',5,'a:1:{s:14:\"email_incoming\";a:6:{s:2:\"id\";s:1:\"5\";s:12:\"sender_email\";s:20:\"zmijevik@hotmail.com\";s:11:\"sender_name\";s:14:\"Joseph Persico\";s:16:\"date_sender_sent\";a:5:{s:5:\"month\";s:1:\"3\";s:3:\"day\";s:2:\"13\";s:4:\"year\";s:4:\"2013\";s:4:\"hour\";s:1:\"0\";s:6:\"minute\";s:2:\"10\";}s:18:\"date_inmate_viewed\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:5:\"Email\";a:9:{s:10:\"email_type\";s:8:\"incoming\";s:9:\"inmate_id\";s:1:\"2\";s:10:\"contact_id\";s:1:\"2\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:8:\"43247329\";s:7:\"message\";s:53:\"give me the fucking commecary shit brains 		 	   		  \";s:10:\"sufficient\";s:2:\"on\";s:6:\"points\";s:0:\"\";s:2:\"id\";s:2:\"17\";}}}','2013-03-13 00:31:16','2013-03-13 00:31:16'),(25,1,'email_outgoing','update',1,'a:1:{s:14:\"email_outgoing\";a:4:{s:2:\"id\";s:1:\"1\";s:15:\"recipient_email\";s:20:\"zmijevik@hotmail.com\";s:4:\"sent\";s:2:\"on\";s:5:\"Email\";a:8:{s:10:\"email_type\";s:8:\"outgoing\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:1:\"2\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:10:\"bail money\";s:7:\"message\";s:64:\"i need one of you to bail me out of here on some bogus charges. \";s:6:\"points\";s:0:\"\";s:2:\"id\";s:1:\"1\";}}}','2013-03-13 17:34:53','2013-03-13 17:34:53'),(26,1,'email_outgoing','update',2,'a:1:{s:14:\"email_outgoing\";a:3:{s:2:\"id\";s:1:\"2\";s:15:\"recipient_email\";s:20:\"zmijevik@hotmail.com\";s:5:\"Email\";a:9:{s:10:\"email_type\";s:8:\"incoming\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:1:\"2\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:9:\"commecary\";s:7:\"message\";s:69:\"i need some cach for commecary please update my email balance as well\";s:10:\"sufficient\";s:2:\"on\";s:6:\"points\";s:0:\"\";s:2:\"id\";s:1:\"2\";}}}','2013-03-13 17:35:09','2013-03-13 17:35:09'),(27,1,'email_outgoing','update',6,'a:1:{s:14:\"email_outgoing\";a:3:{s:2:\"id\";s:1:\"6\";s:15:\"recipient_email\";s:20:\"zmijevik@hotmail.com\";s:5:\"Email\";a:8:{s:10:\"email_type\";s:8:\"outgoing\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:1:\"2\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:5:\"WHore\";s:7:\"message\";s:46:\"You got me arrested bitch im going to kill you\";s:6:\"points\";s:0:\"\";s:2:\"id\";s:1:\"6\";}}}','2013-03-13 17:35:32','2013-03-13 17:35:32'),(28,1,'email_outgoing','update',7,'a:1:{s:14:\"email_outgoing\";a:3:{s:2:\"id\";s:1:\"7\";s:15:\"recipient_email\";s:20:\"zmijevik@hotmail.com\";s:5:\"Email\";a:8:{s:10:\"email_type\";s:8:\"outgoing\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:0:\"\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:7:\"revenge\";s:7:\"message\";s:78:\"you got me arrested fool im gonna bust a cap in your ass when i get outta here\";s:6:\"points\";s:0:\"\";s:2:\"id\";s:1:\"7\";}}}','2013-03-13 17:35:47','2013-03-13 17:35:47'),(29,1,'email_outgoing','update',12,'a:1:{s:14:\"email_outgoing\";a:3:{s:2:\"id\";s:2:\"12\";s:15:\"recipient_email\";s:20:\"zmijevik@hotmail.com\";s:5:\"Email\";a:9:{s:10:\"email_type\";s:8:\"outgoing\";s:9:\"inmate_id\";s:1:\"1\";s:10:\"contact_id\";s:1:\"2\";s:12:\"date_scanned\";a:5:{s:5:\"month\";s:0:\"\";s:3:\"day\";s:0:\"\";s:4:\"year\";s:0:\"\";s:4:\"hour\";s:0:\"\";s:6:\"minute\";s:0:\"\";}s:7:\"subject\";s:11:\"still alive\";s:7:\"message\";s:40:\"are you still alive respond to my email!\";s:10:\"sufficient\";s:2:\"on\";s:6:\"points\";s:0:\"\";s:2:\"id\";s:2:\"14\";}}}','2013-03-13 17:36:03','2013-03-13 17:36:03'),(30,1,'email_outgoing','delete',13,'a:0:{}','2013-03-13 18:38:36','2013-03-13 18:38:36'),(31,1,'inmate','update',2,'a:1:{s:6:\"inmate\";a:5:{s:2:\"id\";s:1:\"2\";s:12:\"email_number\";s:8:\"43247329\";s:11:\"jail_number\";s:8:\"43247329\";s:7:\"balance\";s:4:\"5.00\";s:4:\"User\";a:7:{s:10:\"first_name\";s:3:\"Tim\";s:11:\"middle_name\";s:6:\"Parker\";s:9:\"last_name\";s:0:\"\";s:6:\"prefix\";s:0:\"\";s:6:\"suffix\";s:0:\"\";s:8:\"username\";s:8:\"43247329\";s:2:\"id\";s:1:\"4\";}}}','2013-03-14 21:30:48','2013-03-14 21:30:48'),(32,1,'inmate','update',1,'a:1:{s:6:\"inmate\";a:7:{s:2:\"id\";s:1:\"1\";s:12:\"email_number\";s:8:\"10293847\";s:11:\"jail_number\";s:8:\"10293847\";s:7:\"balance\";s:4:\"5.00\";s:19:\"contacts_approvable\";s:2:\"on\";s:12:\"contact_list\";a:1:{i:0;s:1:\"1\";}s:4:\"User\";a:7:{s:10:\"first_name\";s:6:\"Joseph\";s:11:\"middle_name\";s:0:\"\";s:9:\"last_name\";s:6:\"Persie\";s:6:\"prefix\";s:0:\"\";s:6:\"suffix\";s:0:\"\";s:8:\"username\";s:8:\"10293847\";s:2:\"id\";s:1:\"2\";}}}','2013-03-14 21:31:02','2013-03-14 21:31:02');
/*!40000 ALTER TABLE `audit_logger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `config_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `title`, `description`, `config_key`, `config_value`) VALUES (1,'Send email price','the current rate for sending an email','send_email_price','1.25'),(2,'Receive email price','the current price for receiving an email','receive_email_price','1.25'),(3,'IMAP Username','','imap_username','inmateemail@supraliminalsolutions.com'),(4,'IMAP Password','','imap_password','a1genda666'),(5,'IMAP Connection','','imap_connection','{mail.supraliminalsolutions.com:993/imap/novalidate-cert/ssl}INBOX');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuration`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `config_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuration`
--

LOCK TABLES `configuration` WRITE;
/*!40000 ALTER TABLE `configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `email_address`, `first_name`, `last_name`, `phone_number`, `is_approved`, `created_at`, `updated_at`) VALUES (1,'cstraka@hotmail.com','Chris','Straka',1232343456,1,'2013-02-21 11:19:49','2013-02-21 11:19:49'),(2,'zmijevik@hotmail.com','Joseph','Persie',2343345456,0,'2013-03-12 23:42:01','2013-03-12 23:42:01');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inmate_id` bigint(20) NOT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  `scanned` tinyint(1) NOT NULL DEFAULT '0',
  `date_scanned` datetime DEFAULT NULL,
  `subject` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sufficient` tinyint(1) NOT NULL DEFAULT '0',
  `points` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inmate_id_idx` (`inmate_id`),
  KEY `contact_id_idx` (`contact_id`),
  CONSTRAINT `email_contact_id_contact_id` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  CONSTRAINT `email_inmate_id_inmate_id` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` (`id`, `email_type`, `inmate_id`, `contact_id`, `scanned`, `date_scanned`, `subject`, `message`, `sufficient`, `points`, `created_at`, `updated_at`) VALUES (2,'incoming',1,2,0,NULL,'commecary','i need some cach for commecary please update my email balance as well',1,NULL,'2013-02-22 13:13:26','2013-03-13 17:35:09'),(14,'outgoing',1,2,0,NULL,'still alive','are you still alive respond to my email!',1,NULL,'2013-02-22 23:33:07','2013-03-13 17:36:03'),(15,'incoming',1,NULL,0,NULL,'10293847','i am going to <span class=\"flag_violence\" style=\"color:orange\" >punch</span> and <span class=\"flag_violence\" style=\"color:orange\" >stab</span> you to <span class=\"flag_violence\" style=\"color:orange\" >kill</span> you bitch you are a <span class=\"flag_profane\" style=\"color:red\" >cunt</span> 		 	 		 ',0,4,'2013-03-12 23:40:17','2013-03-12 23:40:17'),(16,'incoming',1,2,0,NULL,'10293847','i am going to <span class=\"flag_violence\" style=\"color:orange\" >punch</span> and <span class=\"flag_violence\" style=\"color:orange\" >stab</span> you to <span class=\"flag_violence\" style=\"color:orange\" >kill</span> you bitch you are a <span class=\"flag_profane\" style=\"color:red\" >cunt</span> 		 	 		 ',1,4,'2013-03-12 23:48:13','2013-03-12 23:48:13'),(17,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary shit brains 		 	   		  ',1,NULL,'2013-03-13 00:11:23','2013-03-13 00:31:16'),(18,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary shit brains 		 	   		  ',0,NULL,'2013-03-13 00:15:14','2013-03-13 00:15:14'),(19,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary shit brains 		 	   		  ',0,NULL,'2013-03-13 00:15:33','2013-03-13 00:15:33'),(20,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary <span class=\"flag_profane\" style=\"color:red\" >shit</span> brains 		 	 		 ',0,1,'2013-03-13 00:20:47','2013-03-13 00:20:47'),(21,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary <span class=\"flag_profane\" style=\"color:red\" >shit</span> brains 		 	 		 ',0,1,'2013-03-13 00:23:50','2013-03-13 00:23:50'),(25,'outgoing',1,2,0,NULL,'test','test',1,NULL,'2013-03-13 19:19:29','2013-03-13 19:19:29'),(26,'outgoing',1,2,0,NULL,'Test','test',1,NULL,'2013-03-13 19:23:44','2013-03-13 19:23:44'),(27,'outgoing',1,2,0,NULL,'Again','again?',1,NULL,'2013-03-13 19:38:24','2013-03-13 19:38:24'),(28,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary <span class=\"flag_profane\" style=\"color:red\" >shit</span> brains 		 	 		 ',0,1,'2013-03-13 20:11:54','2013-03-13 20:11:54'),(29,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary <span class=\"flag_profane\" style=\"color:red\" >shit</span> brains 		 	 		 ',0,1,'2013-03-13 20:17:25','2013-03-13 20:17:25'),(30,'incoming',2,2,0,NULL,'43247329','give me the fucking commecary <span class=\"flag_profane\" style=\"color:red\" >shit</span> brains 		 	 		 ',0,1,'2013-03-13 20:24:16','2013-03-13 20:24:16'),(31,'incoming',1,2,0,NULL,'10293847','this is a test 		 	   		  ',1,NULL,'2013-03-13 20:37:02','2013-03-13 20:37:02'),(32,'incoming',1,2,0,NULL,'10293847','test 		 	   		  ',1,NULL,'2013-03-13 21:09:01','2013-03-13 21:09:01'),(33,'outgoing',1,2,0,NULL,'idiocy','this is fucking idiocy',1,NULL,'2013-03-13 21:34:51','2013-03-13 21:34:51'),(34,'incoming',1,2,0,NULL,'10293847','this is fucking ridiculous 		 	   		  ',1,NULL,'2013-03-13 21:39:01','2013-03-13 21:39:01'),(35,'outgoing',1,2,0,NULL,'test','test',1,NULL,'2013-03-13 21:40:16','2013-03-13 21:40:16'),(36,'incoming',1,2,0,NULL,'10293847','this is another thestt 		 	   		  ',0,NULL,'2013-03-13 21:42:02','2013-03-13 21:42:02');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_incoming`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_incoming` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` bigint(20) NOT NULL,
  `sender_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sender_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inmate_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `date_sender_sent` datetime DEFAULT NULL,
  `date_inmate_viewed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_id_idx` (`email_id`),
  CONSTRAINT `email_incoming_email_id_email_id` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_incoming`
--

LOCK TABLES `email_incoming` WRITE;
/*!40000 ALTER TABLE `email_incoming` DISABLE KEYS */;
INSERT INTO `email_incoming` (`id`, `email_id`, `sender_email`, `sender_name`, `inmate_viewed`, `date_sender_sent`, `date_inmate_viewed`) VALUES (3,15,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-12 23:39:03','2013-03-12 23:49:59'),(4,16,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-12 23:39:03','2013-03-13 00:17:46'),(5,17,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-13 00:10:00','2013-03-13 00:31:44'),(6,18,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(7,19,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(8,20,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(9,21,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-13 00:10:46','2013-03-13 00:25:43'),(10,28,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(11,29,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(12,30,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 00:10:46',NULL),(13,31,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-13 20:36:59','2013-03-13 20:37:16'),(14,32,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-13 21:08:30','2013-03-13 21:09:21'),(15,34,'zmijevik@hotmail.com','Joseph Persico',1,'2013-03-13 21:38:47','2013-03-13 21:39:34'),(16,36,'zmijevik@hotmail.com','Joseph Persico',0,'2013-03-13 21:41:40',NULL);
/*!40000 ALTER TABLE `email_incoming` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_keyword`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_keyword` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` bigint(20) NOT NULL,
  `keyword_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_id_idx` (`email_id`),
  KEY `keyword_id_idx` (`keyword_id`),
  CONSTRAINT `email_keyword_email_id_email_id` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`),
  CONSTRAINT `email_keyword_keyword_id_keyword_id` FOREIGN KEY (`keyword_id`) REFERENCES `keyword` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_keyword`
--

LOCK TABLES `email_keyword` WRITE;
/*!40000 ALTER TABLE `email_keyword` DISABLE KEYS */;
INSERT INTO `email_keyword` (`id`, `email_id`, `keyword_id`) VALUES (1,15,5),(2,15,6),(3,15,7),(4,15,8),(5,16,5),(6,16,6),(7,16,7),(8,16,8),(9,20,2),(10,21,2),(11,28,2),(12,29,2),(13,30,2);
/*!40000 ALTER TABLE `email_keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_outgoing`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_outgoing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_id` bigint(20) NOT NULL,
  `recipient_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email_id_idx` (`email_id`),
  CONSTRAINT `email_outgoing_email_id_email_id` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_outgoing`
--

LOCK TABLES `email_outgoing` WRITE;
/*!40000 ALTER TABLE `email_outgoing` DISABLE KEYS */;
INSERT INTO `email_outgoing` (`id`, `email_id`, `recipient_email`, `sent`) VALUES (2,2,'zmijevik@hotmail.com',1),(12,14,'zmijevik@hotmail.com',1),(16,25,'zmijevik@hotmail.com',1),(17,26,'zmijevik@hotmail.com',1),(18,27,'zmijevik@hotmail.com',1),(19,33,'zmijevik@hotmail.com',1),(20,35,'zmijevik@hotmail.com',1);
/*!40000 ALTER TABLE `email_outgoing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flag`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `color` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cssclass` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flag`
--

LOCK TABLES `flag` WRITE;
/*!40000 ALTER TABLE `flag` DISABLE KEYS */;
INSERT INTO `flag` (`id`, `name`, `description`, `color`, `cssclass`, `weight`) VALUES (1,'profanity','all profane language not necessarily of any particular threat of malicious intent','red','flag_profane',0),(2,'violence','','orange','flag_violence',0);
/*!40000 ALTER TABLE `flag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inmate`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inmate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `email_number` bigint(20) NOT NULL,
  `jail_number` bigint(20) DEFAULT NULL,
  `balance` double(18,2) DEFAULT NULL,
  `contacts_approvable` tinyint(1) NOT NULL DEFAULT '0',
  `emails_approvable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `inmate_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmate`
--

LOCK TABLES `inmate` WRITE;
/*!40000 ALTER TABLE `inmate` DISABLE KEYS */;
INSERT INTO `inmate` (`id`, `user_id`, `email_number`, `jail_number`, `balance`, `contacts_approvable`, `emails_approvable`, `created_at`, `updated_at`) VALUES (1,2,10293847,10293847,5.00,1,0,'2013-02-21 08:57:15','2013-03-14 21:31:03'),(2,4,43247329,43247329,5.00,0,0,'2013-02-22 23:34:10','2013-03-14 21:30:48');
/*!40000 ALTER TABLE `inmate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inmate_contact`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inmate_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inmate_id` bigint(20) NOT NULL,
  `contact_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inmate_id_idx` (`inmate_id`),
  KEY `contact_id_idx` (`contact_id`),
  CONSTRAINT `inmate_contact_contact_id_contact_id` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  CONSTRAINT `inmate_contact_inmate_id_inmate_id` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmate_contact`
--

LOCK TABLES `inmate_contact` WRITE;
/*!40000 ALTER TABLE `inmate_contact` DISABLE KEYS */;
INSERT INTO `inmate_contact` (`id`, `inmate_id`, `contact_id`) VALUES (1,1,1);
/*!40000 ALTER TABLE `inmate_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyword`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keyword` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `flag_id` bigint(20) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `weight` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `flag_id_idx` (`flag_id`),
  CONSTRAINT `keyword_flag_id_flag_id` FOREIGN KEY (`flag_id`) REFERENCES `flag` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyword`
--

LOCK TABLES `keyword` WRITE;
/*!40000 ALTER TABLE `keyword` DISABLE KEYS */;
INSERT INTO `keyword` (`id`, `flag_id`, `name`, `description`, `weight`) VALUES (1,1,'fuck','',0),(2,1,'shit','',0),(3,1,'piss','',0),(4,1,'ass','',0),(5,1,'cunt','',0),(6,2,'kill','',0),(7,2,'punch','',0),(8,2,'stab','',0);
/*!40000 ALTER TABLE `keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `officer`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `officer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `badge_number` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `officer_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `officer`
--

LOCK TABLES `officer` WRITE;
/*!40000 ALTER TABLE `officer` DISABLE KEYS */;
INSERT INTO `officer` (`id`, `badge_number`, `user_id`, `created_at`, `updated_at`) VALUES (1,'12334566',3,'2013-02-21 11:18:53','2013-02-21 11:18:53');
/*!40000 ALTER TABLE `officer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_forgot_password`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_forgot_password`
--

LOCK TABLES `sf_guard_forgot_password` WRITE;
/*!40000 ALTER TABLE `sf_guard_forgot_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_forgot_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (1,'admin','Administrator group','2013-02-21 08:51:34','2013-02-21 08:51:34');
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES (1,1,'2013-02-21 08:51:34','2013-02-21 08:51:34');
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (1,'admin','Administrator permission','2013-02-21 08:51:34','2013-02-21 08:51:34');
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefix` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suffix` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `algorithm` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` (`id`, `first_name`, `middle_name`, `last_name`, `prefix`, `suffix`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES (1,'John',NULL,'Doe',NULL,NULL,'john.doe@gmail.com','admin','sha1','66f64897c80c82281f7201c7b7435b10','847dc164501174e5d9280e30ae71083b036fac19',1,1,'2013-03-14 21:33:01','2013-02-21 08:51:34','2013-03-14 21:33:01'),(2,'Joseph','','Persie','','',NULL,'10293847','sha1','e3205e830f8b1a81afaa706c6f2f94e3','e3204fb8d19ccd794339b2ad4020e2d6acb61a80',1,0,'2013-03-14 21:31:53','2013-02-21 08:57:15','2013-03-14 21:31:53'),(3,'sgt','','baker','','','','sgtbaker','sha1','470916fdbdb0d8b30199b6ac358fd27a','43f479839538b3c5581feefc7ea66097ff2cd311',1,1,'2013-03-14 21:32:17','2013-02-21 11:18:53','2013-03-14 21:32:17'),(4,'Tim','Parker','','','',NULL,'43247329','sha1','37deb933cb4323e864dffe988c32562a','b4b6eebc3b66966b51c62c69ed50fe6565ef8973',1,0,'2013-03-13 00:31:32','2013-02-22 23:34:10','2013-03-13 00:31:32');
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES (1,1,'2013-02-21 08:51:34','2013-02-21 08:51:34');
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-14 21:40:34
