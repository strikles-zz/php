-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: eenvoudcrm
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_index` (`user_id`),
  KEY `assigned_roles_role_id_index` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_roles`
--

LOCK TABLES `assigned_roles` WRITE;
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
INSERT INTO `assigned_roles` VALUES (1,1,1),(2,2,2),(3,3,1),(4,4,1),(5,5,1);
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_user_id_index` (`user_id`),
  KEY `comments_post_id_index` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,1,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2014-10-03 10:13:12','2014-10-03 10:13:12'),(2,1,1,'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.','2014-10-03 10:13:12','2014-10-03 10:13:12'),(3,1,1,'Et consul eirmod feugait mel! Te vix iuvaret feugiat repudiandae. Solet dolore lobortis mei te, saepe habemus imperdiet ex vim. Consequat signiferumque per no, ne pri erant vocibus invidunt te.','2014-10-03 10:13:12','2014-10-03 10:13:12'),(4,1,2,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2014-10-03 10:13:12','2014-10-03 10:13:12'),(5,1,2,'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.','2014-10-03 10:13:12','2014-10-03 10:13:12'),(6,1,3,'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.','2014-10-03 10:13:12','2014-10-03 10:13:12');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bedrijfsnaam` varchar(100) DEFAULT NULL,
  `voornaam` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) DEFAULT NULL,
  `ter_attentie_van` varchar(100) DEFAULT NULL,
  `adres_1` varchar(100) DEFAULT NULL,
  `adres_2` varchar(100) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `plaats` varchar(100) DEFAULT NULL,
  `land` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefoon` varchar(16) DEFAULT NULL,
  `btw_nummer` varchar(45) DEFAULT NULL,
  `kvk_nummer` varchar(45) DEFAULT NULL,
  `rekening_nummer` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'unspecified',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-11-26 23:00:00','2014-11-26 23:00:00',NULL),(4,'Zustersliefde',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'gulaybatman@hotmail.com',NULL,NULL,NULL,NULL,'2014-10-05 10:12:19','2014-10-05 10:17:56',NULL),(5,'AEC Air Support','Michel','Versteeg','Michel Versteeg','Pastoor van Breugelstraat 93c',NULL,'4744 RC','Bosschenhoofd',NULL,'m.versteeg@aecairsupport.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(6,'Aerodynamics BV','Ronald','Wüstefeld','Ronald Wüstefeld','General Aviation Terminal Thermiekstraat 26',NULL,'1117 BC','Schiphol',NULL,'info@aerodynamics.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(7,'Alda Events',NULL,NULL,'','Anthony Fokkerweg 61',NULL,'1059 CP','Amsterdam',NULL,'accountspayable@aldaevents.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:56','2014-12-10 11:29:55',NULL),(8,'Amrop B.V.','Eelco','van Eijck','Eelco van Eijck','Charlotte van Montpensierlaan 2a',NULL,'1181 RR','Amstelveen',NULL,'loes.boerema@amrop.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(9,'Amrop Kohlmann & Young Kft.','Gabriella','Merenyi','Gabriella Merenyi','1022 – Budapest Eszter utca 6/b',NULL,'Hungary',NULL,NULL,'gabriella.merenyi@amrop.hu',NULL,NULL,NULL,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(10,'Amrop Partnership SCRL','Steffi','Gande','Steffi Gande','475 Avenue Louise',NULL,'1050','Ixelles','Belgium','steffi.gande@amrop.com',NULL,'BE 0898 614 829',NULL,NULL,'2014-10-05 10:21:56','2014-11-26 09:19:53',NULL),(11,'Ars Curae',NULL,NULL,'','De Roos van Dekama 20',NULL,'1183 KT','Amstelveen',NULL,'r.collee@spelwaterland-amstelland.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(12,'Ask Guus','Harrald','Heine','Harrald Heine','Amstelveenseweg 122',NULL,'1075 XL',NULL,NULL,'harrald@askguus.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(13,'BASF Coatings Services BV - Maarssen',NULL,NULL,'','c/o BASF Services Europe GmbH Entity 1367',NULL,'10899','Berlin','Germany','ice_1367@basf.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(14,'BASF Coatings Services S.A.',NULL,NULL,'','c/o BASF Services Europe GmbH Entity 1901',NULL,'10899','Berlin','Germany','ice_1901@basf.com',NULL,'BE0464.649.596',NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(15,'Bas Haring',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'mail@basharing.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(16,'Belle Cosmetic Clinics B.V.',NULL,NULL,'','Burg. Mazairaclaan 14',NULL,'5242 AV','Rosmalen',NULL,'paul@laarhuis.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(17,'BlueAmsterdam',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','jasper@blueamsterdam.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(18,'Brandwalk','Tjeerd','Oosterhuis','Tjeerd Oosterhuis','Rapenburgerstraat 173',NULL,'1011 VM','Amsterdam','The Netherlands','tjeerd@brandwalk.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(19,'Conseel',NULL,NULL,'','Claes Jansz Visscherstraat 16',NULL,'7425 PN','Deventer',NULL,'eelco.kums@conseel.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(20,'Contour Kliniek',NULL,NULL,'','Olmenlaan 38',NULL,'1404DG','Bussum','Nederland','e.vaughan@contourkliniek.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(21,'Creatief in communicatie','Eva','Schippers','Eva Schippers','Balistraat 88II',NULL,'1094 JS','Amsterdam',NULL,'evaschippers@gmail.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(22,'De Kikkert','Anne','Glasbergen','Anne Glasbergen','Kooiweg 5',NULL,'8531PV','Lemmer',NULL,'anne@dekikkert.nl',NULL,NULL,'010614370000',NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(23,'De Valk Headoffice','Mattijs','van Baalen','Mattijs van Baalen','\'t Breukeleveense Meentje 6',NULL,'1231 LM','Loosdrecht',NULL,'mvbaalen@devalk.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(24,'De Zaak',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'lennart@booming.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(25,'De Zone','Leonie','Dijkstra','Leonie Dijkstra','Marco Polostraat 265-2',NULL,'1056DM','Amsterdam',NULL,'leoniedijkstra@me.com',NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(26,'Divers (boekhoudkundig)',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(27,'Eclipse B.V.',NULL,NULL,'','Vrolikstraat 48hs',NULL,'1091VG','Amsterdam','Nederland','jasper@kums.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(28,'Eenvoud Media',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','rik@eenvoudmedia.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(29,'Eenvoud Media B.V.',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam',NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(30,'EFD Financieel Advies','Maurice','Ebbers','Maurice Ebbers','Postbus 9020',NULL,'3301 AA','Dordrecht',NULL,'info@efdonline.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(31,'Eva Kums Photography',NULL,NULL,'','Bennebroekstraat 28-1',NULL,'1058 LM','Amsterdam',NULL,'evelienkums@gmail.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(32,'Events In Business','Sharon','van den Hatert','Sharon van den Hatert','Postbus 315',NULL,'1200 AH','Hilversum',NULL,'svandenhatert@hilversumevents.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(33,'Executive Search Baltics OÜ /Amrop',NULL,NULL,'','Tõnismägi 3a',NULL,'Tallinn 10',NULL,'Estonia','iira.kylm@amrop.com',NULL,'EE100307386',NULL,NULL,'2014-10-05 10:22:00','2014-12-16 12:57:18',NULL),(34,'Five Holding BV','Frans','Roos','Frans Roos','Frans Halslaan 5',NULL,'1624 BZ','HOORN','Nederland','frans@roosco.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(35,'FLOW Nederland B.V.','Wilmar','Mol','Wilmar Mol','Daltonstraat 18',NULL,'3335 LR','Zwijndrecht',NULL,'wm@flow-nederland.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(36,'Flucon',NULL,NULL,'','Kalkovenweg 54',NULL,'2401LK','Alphen a/d Rijn',NULL,'christiaan.floor@flucon.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(37,'Havok Studios','Jeroen','de Lange','Jeroen de Lange','Keerkring 19',NULL,'1705SP','Heerhugowaard',NULL,'jeroen@havok.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(38,'Hofmans Associates Letselschadeconsultancy B.V.',NULL,NULL,'','Cornelis Krusemanstraat 75 C (2)',NULL,'1075NJ','Amsterdam',NULL,'d.hofmans@hofmanshelpt.nl',NULL,NULL,'332947840000',NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(39,'Hotel not Hotel',NULL,NULL,'','Frederik Hendrikstraat 23HS',NULL,'1052 HJ','Amsterdam',NULL,'tijmen@hotelnothotel.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(40,'I Love Click','Stefano','Richetta','Stefano Richetta',NULL,NULL,NULL,NULL,NULL,'stefano@iloveclick.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(41,'ITSB',NULL,NULL,'','Lingenskamp 17A',NULL,'1251 JJ','Laren',NULL,'info@itsb-laren.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(42,'Knippels Yachting',NULL,NULL,'','Scheepswerf 1',NULL,'5256PL','Heusden',NULL,'info@knippelsyachting.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(43,'Kosure','N.','Goldstoff','N. Goldstoff','Rustenburgerstraat 25B',NULL,'1074 EP','Amsterdam','The Netherlands','nadav@brandwalk.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(44,'KrasEvents','Isabelle','van Hedel','Isabelle van Hedel','Frederik Hendrikstraat 23HS',NULL,'1052 HJ','Amsterdam',NULL,'ivanhedel@krasevents.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(45,'KroesKontrol','Larissa','Zomerdijk','Larissa Zomerdijk','Willem de Zwijgerlaan 350B/1.3K',NULL,'1055 RD','Amsterdam',NULL,'larissa@kroeskontrol.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(46,'Lingo Tours',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(47,'MAIA Tickets B.V.',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam',NULL,'alexander@maiatickets.nl',NULL,'NL 8531.73.060.B.01','587682110000',NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(48,'Makelaarselect','Raimond','Wijkniet','Raimond Wijkniet','Postbus 58',NULL,'6800 AB','Arnhem',NULL,'info@makelaarselect.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(49,'MAKS / Architecture and Urbanism',NULL,NULL,'','Westewagenstraat 66',NULL,'3011 AT','Rotterdam',NULL,'mk@m-a-k-s.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(50,'Mecta','Maud Aertsen',NULL,'Maud Aertsen','Gijsbrecht van Amstelstraat 272',NULL,'1215 CS','Hilversum',NULL,'maud@mecta.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(51,'Medify','R.','Louis','R. Louis','Vondelstraat 35',NULL,'1054 GJ','Amsterdam','Nederland','rene@medify.eu',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(52,'MKB Servicedesk','Stefan','Vermeul','Stefan Vermeul','Postbus 40273',NULL,'3504 AB','Utrecht',NULL,'administratie@mkbservicedesk.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-11-26 09:19:54',NULL),(53,'Moonen Yachts','Dorien','Bilterijst','Dorien Bilterijst','Graaf van Solmsweg 52F',NULL,'5203 DD','\'s-Hertogenbosch',NULL,'dorien.bilterijst@moonen.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(54,'Musea Utrecht','Ward','Rennen','Ward Rennen','Domplein 24',NULL,'3512 JE','Utrecht',NULL,'bureautimmermans@gmail.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(55,'Nationaal Huidcentrum',NULL,NULL,'','Olmenlaan 38',NULL,'1404DG','Bussum','Nederland','e.vaughan@contourkliniek.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(56,'Perfectindicator','Rob','Bliekendaal','Rob Bliekendaal','Oude Postweg 46',NULL,'3711AJ','Austerlitz',NULL,'rob.bliekendaal@eneco.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(57,'Pharmatube V.O.F.',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','info@pharmatube.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(58,'Pim Hendriksen Photography','Pim','Hendriksen','Pim Hendriksen','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','info@pimhendriksen.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(59,'ProFluid B.V.',NULL,NULL,'','Hellingstraat 22',NULL,'1271 VA','Huizen',NULL,'m.vantrigt@profluid.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(60,'Qikker Online',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','michiel@qikkeronline.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(61,'Rainbow Ranch','Robert','Collee','Robert Collee','Garderenseweg 158',NULL,'3881 NE','Putten',NULL,'r.collee@spelwaterland-amstelland.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(62,'Reequest',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','info@reequest.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(63,'Roos & Co BV','Frans','Roos','Frans Roos','Frans Halslaan 5',NULL,'1624 BZ','Hoorn',NULL,'valerie@roosco.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(64,'Scagon Theater','Peter','Meekel','Peter Meekel','Buiskoolstraat 29',NULL,'1741 EJ','Schagen','Nederland','p.meekel@wxs.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(65,'Sciandri Sportmanagement',NULL,NULL,'','Postbus 9593',NULL,'2003	LN','Haarlem',NULL,'linda@sciandri.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(66,'Soli infratechniek B.V.',NULL,NULL,'','De Kleine Elst',NULL,'5246 JJ','Rosmalen',NULL,'info@hetconcept.nl',NULL,NULL,'554905650000',NULL,'2014-10-05 10:22:06','2014-12-10 11:29:57',NULL),(67,'Sorpasso Communicatieconcepten','Peter','Lodeizen','Peter Lodeizen','Danzigerkade 9E',NULL,'1013 AP','Amsterdam',NULL,'peter@sorpasso.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:06','2014-10-05 10:22:06',NULL),(68,'Sorpasso Duco','Duco','Reitsma','Duco Reitsma','Danzigerkade 9E',NULL,'1013 AP','Amsterdam',NULL,'duco@sorpasso.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(69,'Stichting Open Studio Dagen','Sharon','van den Hatert','Sharon van den Hatert','Postbus 315',NULL,'1200 AH','Hilversum',NULL,'svandenhatert@hilversumevents.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(70,'Stichting Tijd van de Wolf','Marc','Meijer','Marc Meijer','Postbus 94002',NULL,'1090GA','Amsterdam',NULL,'leoniedijkstra@me.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(71,'Storm Yachts B.V.','Rob','van Kesteren','Rob van Kesteren','Scheepswerf 1',NULL,'5256 PL','Heusden',NULL,'info@stormyachts.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(72,'Tandartsen Groepspraktijk Westzijde','Dennis','Schmeitz','Dennis Schmeitz','Westzijde 79',NULL,'1506 ED','Zaandam',NULL,'d.schmeitz@westzijde.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(73,'Tandheelkundig Centrum Rokkeveen',NULL,NULL,'','Algengroen 1',NULL,'2718GN','Zoetermeer',NULL,'frank.poorter@tzcrokkeveen.nl',NULL,NULL,'584906470000',NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(76,'Think Bananas','Lars','Kolsteren','Lars Kolsteren','Sloterweg 1187',NULL,'1066 CE','Amsterdam',NULL,'lars@thinkbananas.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(77,'Timm en Pimm',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013CN','Amsterdam','Nederland','jelmer@timmenpimm.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(78,'Hittm','Nick','Wevers','Nick Wevers','Seranggracht 11',NULL,'1019 PM','Amsterdam',NULL,'nick@toekomt.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:08','2014-11-04 14:55:08',NULL),(79,'\'t Rekenhuys',NULL,NULL,'','Olmenlaan 30',NULL,'1404DG','Bussum',NULL,'wilma@rekenhuys.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(80,'Unravel Incentives','Willemijn','Zandbergen','Willemijn Zandbergen','Bloys van Treslongstraat 29-1',NULL,'1056 WX',NULL,NULL,'info@unravel-incentives.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(81,'Vaarbewijsopleidingen B.V.','Ben','Ros','Ben Ros','Waspikseweg 5',NULL,'5109 RE','’s Gravenmoer',NULL,'benros@ziggo.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(82,'Vortex Capital Partners',NULL,NULL,'','Barbara Strozzilaan 101',NULL,'1083 HN','Amsterdam',NULL,'ronaldjan@vortexcp.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(83,'Vrienden van BlueAmsterdam',NULL,NULL,'','Van Diemenstraat 96',NULL,'1013 CN','Amsterdam','Nederland','jasper@yappo.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(84,'WhatiFolution B.V.',NULL,NULL,'','Burgemeester van Gilsstraat 38',NULL,'4813 PS','Breda',NULL,'ted.truijens@whatifolution.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(85,'WhatiFolution Modelling B.V.',NULL,NULL,'','Antonie van Leeuwenhoekweg 38K',NULL,'2408 AN','Alphen aan den Rijn',NULL,'bert.boekling@whatifolution.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(86,'Yappo','Jasper','Kums','Jasper Kums','Van Diemenstraat 96',NULL,'1013 CN','Amsterdam','Nederland','jasper@yappo.nl',NULL,NULL,NULL,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(87,'Yuno Advisors',NULL,NULL,'','Barbara Strozzilaan 201',NULL,'1083HN','Amsterdam',NULL,'info@yunoadvisors.com',NULL,NULL,NULL,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(88,'Davids Advocaten B.V','Nils','Reerink','Nils Reerink','De Ruyterkade 142',NULL,'1011 AC','Amsterdam',NULL,'nils.reerink@davidslaw.nl',NULL,NULL,NULL,NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(89,'Lingo Tours','Johan','Schersten','Johan Schersten','Rustenburgerstraat 276 H',NULL,'1073GL','Amsterdam',NULL,'info@lingo-tours.com',NULL,NULL,'615980380000',NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(90,'ViaVendi B.V.',NULL,NULL,'','Koivistokade 56',NULL,'1013 BB','Amsterdam',NULL,'bob.woutersen@viavendi.nl',NULL,NULL,NULL,NULL,'2014-11-04 14:55:09','2014-11-04 14:55:09',NULL),(91,'Amfico B.V.','Erwin','Pater','Erwin Pater','Zegheweg 8 a',NULL,'3931MR','Woudenberg','Nederland','info@amfico.nl',NULL,NULL,'511777060000',NULL,'2014-11-04 14:56:46','2014-11-26 09:19:53',NULL),(92,'Amrop Partnership SCRL','Costa','Tzavaras','Costa Tzavaras','475 Avenue Louise',NULL,'1050','Ixelles','Belgium','costa.tzavaras@amrop.com',NULL,'BE 0898 614 829',NULL,NULL,'2014-11-26 09:19:53','2014-11-26 09:19:53',NULL),(93,'Hermitage',NULL,NULL,'','P.O. Box 11675',NULL,'1001 GR','Amsterdam',NULL,'m.vankampen@nieuwekerk.nl',NULL,NULL,NULL,NULL,'2014-11-26 09:19:53','2014-11-27 11:52:56',NULL),(94,'Reputatiegroep',NULL,NULL,'','Maliebaan 92',NULL,'3581CX','Utrecht',NULL,'c.brits@reputatiegroep.nl',NULL,NULL,NULL,NULL,'2014-11-26 09:19:54','2014-11-27 11:52:57',NULL),(95,'R.I.B. B.V.','Arjan','Ribbe','Arjan Ribbe','Laan van Kronenburg 14',NULL,'1183AS','Amstelveen',NULL,NULL,NULL,NULL,'321441410000',NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(96,'TEST',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,'andre@eenvoudmedia.nl',NULL,NULL,NULL,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(97,'Poorter Tandartsen','Frank','Poorter','Frank Poorter','Aidaschouw 1',NULL,'2726 JZ','Zoetermeer',NULL,'frankpoorter@hotmail.com',NULL,NULL,'34342322',NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(98,'Vanquish Yacht Building B.V.',NULL,NULL,'','Oud-Loosdrechtsedijk 161',NULL,'1231 LV','Loosdrecht',NULL,NULL,NULL,NULL,NULL,NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(100,'Tardix BV','Rob','van Kesteren','Rob van Kesteren','Daltonstraat 40',NULL,'3335 LR','Zwijndrecht',NULL,'rj.vankesteren@gmail.com',NULL,NULL,NULL,NULL,'2014-12-01 12:57:34','2014-12-01 12:57:34',NULL),(101,'Chapman Tenders B.V.',NULL,NULL,'','Oud-Loosdrechtsedijk 161',NULL,'1231 LV','Loosdrecht',NULL,'tom@chapmantenders.com',NULL,NULL,NULL,NULL,'2014-12-10 11:29:56','2014-12-16 12:57:17',NULL),(102,'Jewel Labs',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-10 11:29:56','2014-12-10 11:29:56',NULL),(103,'MMA Sp. z o.o. Sp. k.','Agnieszka','Agnieszka','Agnieszka Agnieszka','Al. Jana Pawla II 19',NULL,'00-854','Warszawa','Poland','sarnacka@amrop.pl',NULL,'PL 526-18-88-926',NULL,NULL,'2014-12-10 11:29:57','2014-12-16 12:57:18',NULL),(104,'Jachtwerf Arie Wiegmans B.V.',NULL,NULL,'','Scheendijk 6',NULL,'3621 VB','Breukelen',NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL),(105,'Vinings Capital Partners B.V.',NULL,NULL,'','Postbus 166',NULL,'2215 ZJ','Voorhout',NULL,NULL,NULL,NULL,NULL,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companymeta`
--

DROP TABLE IF EXISTS `companymeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companymeta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `type` varchar(32) DEFAULT NULL,
  `subtype` varchar(32) DEFAULT NULL,
  `key` varchar(45) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `company_idx` (`company_id`),
  CONSTRAINT `company` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companymeta`
--

LOCK TABLES `companymeta` WRITE;
/*!40000 ALTER TABLE `companymeta` DISABLE KEYS */;
INSERT INTO `companymeta` VALUES (11,4,'moneybird','contact','customerid',74,NULL,'2014-10-05 10:12:19','2014-10-05 10:17:56',NULL),(12,4,'moneybird','contact','id',2005283,NULL,'2014-10-05 10:12:19','2014-10-05 10:17:56',NULL),(13,5,'moneybird','contact','customerid',37,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(14,5,'moneybird','contact','id',1549656,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(15,6,'moneybird','contact','customerid',44,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(16,6,'moneybird','contact','id',1549663,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(17,7,'moneybird','contact','customerid',34,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(18,7,'moneybird','contact','id',1549653,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(19,8,'moneybird','contact','customerid',36,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(20,8,'moneybird','contact','id',1549655,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(21,9,'moneybird','contact','customerid',30,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(22,9,'moneybird','contact','id',1549649,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(23,10,'moneybird','contact','customerid',29,NULL,'2014-10-05 10:21:56','2014-10-05 10:21:56',NULL),(24,10,'moneybird','contact','id',1549648,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(25,11,'moneybird','contact','customerid',47,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(26,11,'moneybird','contact','id',1549666,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(27,12,'moneybird','contact','customerid',70,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(28,12,'moneybird','contact','id',1837253,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(29,13,'moneybird','contact','customerid',51,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(30,13,'moneybird','contact','id',1549670,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(31,14,'moneybird','contact','customerid',31,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(32,14,'moneybird','contact','id',1549650,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(33,15,'moneybird','contact','customerid',3,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(34,15,'moneybird','contact','id',1549620,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(35,16,'moneybird','contact','customerid',2,NULL,'2014-10-05 10:21:57','2014-10-05 10:21:57',NULL),(36,16,'moneybird','contact','id',1549619,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(37,17,'moneybird','contact','customerid',11,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(38,17,'moneybird','contact','id',1549628,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(39,18,'moneybird','contact','customerid',83,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(40,18,'moneybird','contact','id',2302686,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(41,19,'moneybird','contact','customerid',25,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(42,19,'moneybird','contact','id',1549642,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(43,20,'moneybird','contact','customerid',7,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(44,20,'moneybird','contact','id',1549624,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(45,21,'moneybird','contact','customerid',69,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(46,21,'moneybird','contact','id',1834139,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(47,22,'moneybird','contact','customerid',73,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(48,22,'moneybird','contact','id',1895381,NULL,'2014-10-05 10:21:58','2014-10-05 10:21:58',NULL),(49,23,'moneybird','contact','customerid',41,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(50,23,'moneybird','contact','id',1549660,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(51,24,'moneybird','contact','customerid',86,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(52,24,'moneybird','contact','id',2323816,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(53,25,'moneybird','contact','customerid',79,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(54,25,'moneybird','contact','id',2229152,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(55,26,'moneybird','contact','customerid',27,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(56,26,'moneybird','contact','id',1549644,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(57,27,'moneybird','contact','customerid',12,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(58,27,'moneybird','contact','id',1549629,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(59,28,'moneybird','contact','customerid',5,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(60,28,'moneybird','contact','id',1549622,NULL,'2014-10-05 10:21:59','2014-10-05 10:21:59',NULL),(61,29,'moneybird','contact','customerid',1,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(62,29,'moneybird','contact','id',1549618,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(63,30,'moneybird','contact','customerid',84,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(64,30,'moneybird','contact','id',2302723,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(65,31,'moneybird','contact','customerid',24,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(66,31,'moneybird','contact','id',1549641,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(67,32,'moneybird','contact','customerid',46,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(68,32,'moneybird','contact','id',1549665,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(69,33,'moneybird','contact','customerid',28,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(70,33,'moneybird','contact','id',1549647,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(71,34,'moneybird','contact','customerid',49,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(72,34,'moneybird','contact','id',1549668,NULL,'2014-10-05 10:22:00','2014-10-05 10:22:00',NULL),(73,35,'moneybird','contact','customerid',38,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(74,35,'moneybird','contact','id',1549657,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(75,36,'moneybird','contact','customerid',67,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(76,36,'moneybird','contact','id',1672123,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(77,37,'moneybird','contact','customerid',10,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(78,37,'moneybird','contact','id',1549627,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(79,38,'moneybird','contact','customerid',77,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(80,38,'moneybird','contact','id',2095898,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(81,39,'moneybird','contact','customerid',35,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(82,39,'moneybird','contact','id',1549654,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(83,40,'moneybird','contact','customerid',85,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(84,40,'moneybird','contact','id',2309818,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(85,41,'moneybird','contact','customerid',87,NULL,'2014-10-05 10:22:01','2014-10-05 10:22:01',NULL),(86,41,'moneybird','contact','id',2354803,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(87,42,'moneybird','contact','customerid',66,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(88,42,'moneybird','contact','id',1653522,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(89,43,'moneybird','contact','customerid',88,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(90,43,'moneybird','contact','id',2368610,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(91,44,'moneybird','contact','customerid',54,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(92,44,'moneybird','contact','id',1549673,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(93,45,'moneybird','contact','customerid',50,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(94,45,'moneybird','contact','id',1549669,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(95,46,'moneybird','contact','customerid',90,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(96,46,'moneybird','contact','id',2373912,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(97,47,'moneybird','contact','customerid',76,NULL,'2014-10-05 10:22:02','2014-10-05 10:22:02',NULL),(98,47,'moneybird','contact','id',2087194,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(99,48,'moneybird','contact','customerid',65,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(100,48,'moneybird','contact','id',1604990,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(101,49,'moneybird','contact','customerid',23,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(102,49,'moneybird','contact','id',1549640,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(103,50,'moneybird','contact','customerid',80,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(104,50,'moneybird','contact','id',2230020,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(105,51,'moneybird','contact','customerid',9,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(106,51,'moneybird','contact','id',1549626,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(107,52,'moneybird','contact','customerid',56,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(108,52,'moneybird','contact','id',1549675,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(109,53,'moneybird','contact','customerid',40,NULL,'2014-10-05 10:22:03','2014-10-05 10:22:03',NULL),(110,53,'moneybird','contact','id',1549659,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(111,54,'moneybird','contact','customerid',57,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(112,54,'moneybird','contact','id',1549676,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(113,55,'moneybird','contact','customerid',6,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(114,55,'moneybird','contact','id',1549623,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(115,56,'moneybird','contact','customerid',26,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(116,56,'moneybird','contact','id',1549643,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(117,57,'moneybird','contact','customerid',15,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(118,57,'moneybird','contact','id',1549632,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(119,58,'moneybird','contact','customerid',20,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(120,58,'moneybird','contact','id',1549637,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(121,59,'moneybird','contact','customerid',63,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(122,59,'moneybird','contact','id',1550432,NULL,'2014-10-05 10:22:04','2014-10-05 10:22:04',NULL),(123,60,'moneybird','contact','customerid',4,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(124,60,'moneybird','contact','id',1549621,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(125,61,'moneybird','contact','customerid',45,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(126,61,'moneybird','contact','id',1549664,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(127,62,'moneybird','contact','customerid',14,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(128,62,'moneybird','contact','id',1549631,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(129,63,'moneybird','contact','customerid',58,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(130,63,'moneybird','contact','id',1549677,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(131,64,'moneybird','contact','customerid',13,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(132,64,'moneybird','contact','id',1549630,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(133,65,'moneybird','contact','customerid',55,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(134,65,'moneybird','contact','id',1549674,NULL,'2014-10-05 10:22:05','2014-10-05 10:22:05',NULL),(135,66,'moneybird','contact','customerid',71,NULL,'2014-10-05 10:22:06','2014-10-05 10:22:06',NULL),(136,66,'moneybird','contact','id',1849645,NULL,'2014-10-05 10:22:06','2014-10-05 10:22:06',NULL),(137,67,'moneybird','contact','customerid',52,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(138,67,'moneybird','contact','id',1549671,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(139,68,'moneybird','contact','customerid',53,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(140,68,'moneybird','contact','id',1549672,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(141,69,'moneybird','contact','customerid',39,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(142,69,'moneybird','contact','id',1549658,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(143,70,'moneybird','contact','customerid',81,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(144,70,'moneybird','contact','id',2237513,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(145,71,'moneybird','contact','customerid',42,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(146,71,'moneybird','contact','id',1549661,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(147,72,'moneybird','contact','customerid',61,NULL,'2014-10-05 10:22:07','2014-10-05 10:22:07',NULL),(148,72,'moneybird','contact','id',1550253,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(149,73,'moneybird','contact','customerid',72,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(150,73,'moneybird','contact','id',1877285,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(155,76,'moneybird','contact','customerid',64,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(156,76,'moneybird','contact','id',1604880,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(157,77,'moneybird','contact','customerid',8,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(158,77,'moneybird','contact','id',1549625,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(159,78,'moneybird','contact','customerid',89,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(160,78,'moneybird','contact','id',2373908,NULL,'2014-10-05 10:22:08','2014-10-05 10:22:08',NULL),(161,79,'moneybird','contact','customerid',62,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(162,79,'moneybird','contact','id',1550425,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(163,80,'moneybird','contact','customerid',68,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(164,80,'moneybird','contact','id',1814850,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(165,81,'moneybird','contact','customerid',78,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(166,81,'moneybird','contact','id',2212176,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(167,82,'moneybird','contact','customerid',60,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(168,82,'moneybird','contact','id',1549679,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(169,83,'moneybird','contact','customerid',59,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(170,83,'moneybird','contact','id',1549678,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(171,84,'moneybird','contact','customerid',17,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(172,84,'moneybird','contact','id',1549634,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(173,85,'moneybird','contact','customerid',82,NULL,'2014-10-05 10:22:09','2014-10-05 10:22:09',NULL),(174,85,'moneybird','contact','id',2267372,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(175,86,'moneybird','contact','customerid',48,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(176,86,'moneybird','contact','id',1549667,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(177,87,'moneybird','contact','customerid',16,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(178,87,'moneybird','contact','id',1549633,NULL,'2014-10-05 10:22:10','2014-10-05 10:22:10',NULL),(179,88,'moneybird','contact','customerid',91,NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(180,88,'moneybird','contact','id',2388343,NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(181,89,'moneybird','contact','customerid',92,NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(182,89,'moneybird','contact','id',2393561,NULL,'2014-11-04 14:55:08','2014-11-04 14:55:08',NULL),(183,90,'moneybird','contact','customerid',93,NULL,'2014-11-04 14:55:09','2014-11-04 14:55:09',NULL),(184,90,'moneybird','contact','id',2426927,NULL,'2014-11-04 14:55:09','2014-11-04 14:55:09',NULL),(185,91,'moneybird','contact','customerid',94,NULL,'2014-11-04 14:56:46','2014-11-04 14:56:46',NULL),(186,91,'moneybird','contact','id',2480842,NULL,'2014-11-04 14:56:46','2014-11-04 14:56:46',NULL),(189,28,'hosting',NULL,'hosting_info',NULL,'<div>I\'m trying to add the following text, but it only saves the first bombaclatz</div><div>&nbsp;</div><div><span style=\"color: rgb(34, 34, 34); font-family: monospace;\"><b>Username:&nbsp; &nbsp; &nbsp; &nbsp;amfico</b></span></div><div><span style=\"color: rgb(34, 34, 34); font-family: monospace;\"><b>Password:&nbsp; &nbsp; &nbsp; &nbsp;3o2IjYh2d</b></span></div><div><span style=\"color: rgb(34, 34, 34); font-family: monospace;\"><b>Domain:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b></span><a href=\"http://amfico.nl/\"><span style=\"color: rgb(34, 34, 34); font-family: monospace;\"><b>amfico</b></span><span style=\"color: rgb(17, 85, 204); font-family: monospace;\"><b>.nl</b></span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">To log in immediately, follow this link, using your username and password:</span></div><div><br></div><div><a href=\"http://178.18.143.75:2222/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">http://178.18.143.75:2222</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Once your domain resolves, you will be able to follow this link:</span></div><div><br></div><div><a href=\"http://www.amfico.nl:2222/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">http://www.</span><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">amfico</span><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">.nl:2222</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Bandwidth:&nbsp; &nbsp; &nbsp; 20000 Megabytes</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Disk Space:&nbsp; &nbsp; &nbsp;10000 Megabytes</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Virtual Domains:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Subdomains:&nbsp; &nbsp; &nbsp;unlimited</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">POP Email Accounts:&nbsp; &nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Email Forwarders:&nbsp; &nbsp; &nbsp; &nbsp;5</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Email Autoresponders:&nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Email Mailing Lists:&nbsp; &nbsp; 10</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">POP Server:&nbsp; &nbsp; &nbsp;</span><a href=\"http://mail.amfico.nl/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">mail.</span><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">amfico</span><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">.nl</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">SMTP Server:&nbsp; &nbsp;&nbsp;</span><a href=\"http://mail.amfico.nl/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">mail.</span><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">amfico</span><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">.nl</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Login:&nbsp;&nbsp;amfico</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;3o2IjYh2d</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">FTP accounts:&nbsp; &nbsp;3</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Anonymous FTP:&nbsp; OFF</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">FTP Server:&nbsp; &nbsp; &nbsp;</span><a href=\"http://ftp.amfico.nl/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">ftp.</span><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">amfico</span><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">.nl</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Login:&nbsp;&nbsp;amfico</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;3o2IjYh2d</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">IP:&nbsp; &nbsp; &nbsp;178.18.143.75</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Use&nbsp;</span><a href=\"http://178.18.143.75/%7Eamfico\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">178.18.143.75/~</span><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">amfico</span></a><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">&nbsp;to access it until the domain resolves.</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">You must use these dns servers for your domain. They can be changed through your domain registrar.</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">NS1:&nbsp; &nbsp;&nbsp;</span><a href=\"http://ns1.dehostingfirma.nl/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">ns1.dehostingfirma.nl</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">NS1 IP: 94.103.157.131</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">NS2:&nbsp; &nbsp;&nbsp;</span><a href=\"http://ns2.dehostingfirma.nl/\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">ns2.dehostingfirma.nl</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">NS2 IP:&nbsp;</span><a href=\"tel:77.243.237.35\"><span style=\"color: rgb(17, 85, 204); font-family: arial,sans-serif;\">77.243.237.35</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">MySQL Databases:&nbsp; &nbsp; &nbsp; &nbsp; 10</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Domain Pointers:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">SSH Access:&nbsp; &nbsp; &nbsp;OFF</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">Secure Socket Layer:&nbsp; &nbsp; OFF</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">CGI:&nbsp; &nbsp; OFF</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">PHP:&nbsp; &nbsp; ON</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial,sans-serif;\">DNS control:&nbsp; &nbsp; OFF</span></div><div>ÃÂ¢ÃÂÃÂ</div>','2014-11-06 13:24:20','2014-12-29 08:23:29',NULL),(190,30,'hosting',NULL,'hosting_info',NULL,'<blockquote>\n<div>\n<blockquote>Inloggen op het Control Panel via&nbsp;<a href=\"https://mijn.hostnet.nl/\" target=\"_blank\">https://mijn.hostnet.nl</a>.<br />Log in op Mijn Hostnet en klik op Naar Control Panel.</blockquote>\n<blockquote>info@efdonline.nl</blockquote>\n<blockquote>EfdOnline_3</blockquote>\n</div>\n</blockquote>\n<div>&nbsp;</div>\n<div>&nbsp;</div>\n<div>&nbsp;</div>\n<div>\n<blockquote style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">\n<div style=\"word-wrap: break-word;\">\n<blockquote>Accountgegevens Webhosting Start voor&nbsp;<a style=\"color: #1155cc;\" href=\"http://www.efdonline.nl/\" target=\"_blank\">www.efdonline.nl</a><br />------------------------------<wbr />------------------------------<wbr />------------------------------<wbr />------------------<br /><br />Publiceren van uw website<br />FTP-server:&nbsp;<a style=\"color: #1155cc;\" href=\"http://ftp.efdonline.nl/\" target=\"_blank\">ftp.efdonline.nl</a>&nbsp;of 91.184.19.40<br />FTP-loginnaam: f158019<br />FTP-wachtwoord: w8a39055<br />FTP-directory: webspace/httpdocs/<a style=\"color: #1155cc;\" href=\"http://efdonline.nl/\" target=\"_blank\">efdonline.nl</a><br /><br />Inloggen op het Control Panel via&nbsp;<a style=\"color: #1155cc;\" href=\"https://mijn.hostnet.nl/\" target=\"_blank\">https://mijn.hostnet.nl</a>.<br />Log in op Mijn Hostnet en klik op Naar Control Panel.<br /><br />Online uw e-mail bekijken en versturen via&nbsp;<a style=\"color: #1155cc;\" href=\"http://webmail.efdonline.nl/\" target=\"_blank\">http://webmail.efdonline.nl</a><br />Webmail loginnaam:&nbsp;<a style=\"color: #1155cc;\" href=\"mailto:info@efdonline.nl\" target=\"_blank\">info@efdonline.nl</a><br />Webmail wachtwoord: E66t28h7</blockquote>\n</div>\n</blockquote>\n</div>','2014-11-07 11:55:38','2014-11-07 11:55:38',NULL),(191,91,'hosting',NULL,'hosting_info',NULL,'<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Username:','2014-11-21 10:39:26','2014-11-21 10:39:26',NULL),(192,67,'hosting',NULL,'hosting_info',NULL,'<p>&nbsp;\"host\": \"beconvincing.nl\",</p>\n<p>&nbsp; &nbsp; \"user\": \"kasper@beconvincing.nl\",</p>\n<p>&nbsp; &nbsp; \"password\": \"yMUM9GvJYA\",</p>','2014-11-25 11:11:20','2014-11-25 11:11:20',NULL),(193,92,'moneybird','contact','customerid',96,NULL,'2014-11-26 09:19:53','2014-11-26 09:19:53',NULL),(194,92,'moneybird','contact','id',2525377,NULL,'2014-11-26 09:19:53','2014-11-26 09:19:53',NULL),(195,93,'moneybird','contact','customerid',98,NULL,'2014-11-26 09:19:53','2014-11-26 09:19:53',NULL),(196,93,'moneybird','contact','id',2526168,NULL,'2014-11-26 09:19:53','2014-11-26 09:19:53',NULL),(197,94,'moneybird','contact','customerid',97,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(198,94,'moneybird','contact','id',2525397,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(199,95,'moneybird','contact','customerid',99,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(200,95,'moneybird','contact','id',2535386,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(201,96,'moneybird','contact','customerid',95,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(202,96,'moneybird','contact','id',2520542,NULL,'2014-11-26 09:19:54','2014-11-26 09:19:54',NULL),(203,94,'hosting',NULL,'hosting_info',NULL,'<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Username:&nbsp; &nbsp; &nbsp; &nbsp;repgroep</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;w7DGJ3sRc</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Domain:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://patientenplatformurticaria.nl/\" target=\"_blank\">patientenplatformurticaria.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">To log in immediately, follow this link, using your username and password:</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://178.18.143.75:2222/\" target=\"_blank\">http://178.18.143.75:2222</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Once your domain resolves, you will be able to follow this link:</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://www.patientenplatformurticaria.nl:2222/\" target=\"_blank\">http://www.<wbr />patientenplatformurticaria.nl:<wbr />2222</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Bandwidth:&nbsp; &nbsp; &nbsp; 20000 Megabytes</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Disk Space:&nbsp; &nbsp; &nbsp;10000 Megabytes</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Virtual Domains:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Subdomains:&nbsp; &nbsp; &nbsp;unlimited</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">POP Email Accounts:&nbsp; &nbsp; &nbsp;20</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Forwarders:&nbsp; &nbsp; &nbsp; &nbsp;5</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Autoresponders:&nbsp; &nbsp;20</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Mailing Lists:&nbsp; &nbsp; 10</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">POP Server:&nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://mail.patientenplatformurticaria.nl/\" target=\"_blank\">mail.<wbr />patientenplatformurticaria.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">SMTP Server:&nbsp; &nbsp;&nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://mail.patientenplatformurticaria.nl/\" target=\"_blank\">mail.<wbr />patientenplatformurticaria.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Login:&nbsp; repgroep</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;w7DGJ3sRc</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">FTP accounts:&nbsp; &nbsp;3</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Anonymous FTP:&nbsp; OFF</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">FTP Server:&nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://ftp.patientenplatformurticaria.nl/\" target=\"_blank\">ftp.<wbr />patientenplatformurticaria.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Login:&nbsp; repgroep</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;w7DGJ3sRc</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">IP:&nbsp; &nbsp; &nbsp;178.18.143.75</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Use&nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://178.18.143.75/~repgroep\" target=\"_blank\">178.18.143.75/~repgroep</a><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">&nbsp;to access it until the domain resolves.</span></p>','2014-11-26 09:20:21','2014-11-26 09:20:58',NULL),(204,97,'moneybird','contact','customerid',101,NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(205,97,'moneybird','contact','id',2555283,NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(206,98,'moneybird','contact','customerid',100,NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(207,98,'moneybird','contact','id',2550088,NULL,'2014-11-27 11:52:57','2014-11-27 11:52:57',NULL),(208,97,'hosting',NULL,'hosting_info',NULL,'<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Username:&nbsp; &nbsp; &nbsp; &nbsp;poorter</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;v2uyJgmvW1</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Domain:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://poortertandartsen.nl/\" target=\"_blank\">poortertandartsen.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">To log in immediately, follow this link, using your username and password:</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://178.18.143.75:2222/\" target=\"_blank\">http://178.18.143.75:2222</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Once your domain resolves, you will be able to follow this link:</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://www.poortertandartsen.nl:2222/\" target=\"_blank\">http://www.poortertandartsen.<wbr />nl:2222</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Bandwidth:&nbsp; &nbsp; &nbsp; 20000 Megabytes</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Disk Space:&nbsp; &nbsp; &nbsp;10000 Megabytes</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Virtual Domains:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Subdomains:&nbsp; &nbsp; &nbsp;unlimited</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">POP Email Accounts:&nbsp; &nbsp; &nbsp;20</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Forwarders:&nbsp; &nbsp; &nbsp; &nbsp;5</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Autoresponders:&nbsp; &nbsp;20</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Email Mailing Lists:&nbsp; &nbsp; 10</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">POP Server:&nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://mail.poortertandartsen.nl/\" target=\"_blank\">mail.poortertandartsen.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">SMTP Server:&nbsp; &nbsp;&nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://mail.poortertandartsen.nl/\" target=\"_blank\">mail.poortertandartsen.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Login:&nbsp; poorter</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;v2uyJgmvW1</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">FTP accounts:&nbsp; &nbsp;3</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Anonymous FTP:&nbsp; OFF</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">FTP Server:&nbsp; &nbsp; &nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://ftp.poortertandartsen.nl/\" target=\"_blank\">ftp.poortertandartsen.nl</a><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Login:&nbsp; poorter</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;v2uyJgmvW1</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">IP:&nbsp; &nbsp; &nbsp;178.18.143.75</span><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\" /><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">Use&nbsp;</span><a style=\"color: #1155cc; font-family: arial, sans-serif; font-size: 13px;\" href=\"http://178.18.143.75/~poorter\" target=\"_blank\">178.18.143.75/~poorter</a><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 13px;\">&nbsp;to access it until the domain resolves.</span></p>','2014-11-27 12:01:18','2014-11-27 12:01:18',NULL),(209,7,'hosting',NULL,'hosting_info',NULL,'<div>https://projects.aldaevents.com</div>','2014-11-28 09:48:44','2014-11-28 09:48:44',NULL),(212,100,'moneybird','contact','customerid',33,NULL,'2014-12-01 12:57:34','2014-12-01 12:57:34',NULL),(213,100,'moneybird','contact','id',2009356,NULL,'2014-12-01 12:57:34','2014-12-01 12:57:34',NULL),(214,101,'moneybird','contact','customerid',102,NULL,'2014-12-10 11:29:56','2014-12-10 11:29:56',NULL),(215,101,'moneybird','contact','id',2590643,NULL,'2014-12-10 11:29:56','2014-12-10 11:29:56',NULL),(216,102,'moneybird','contact','customerid',103,NULL,'2014-12-10 11:29:56','2014-12-10 11:29:56',NULL),(217,102,'moneybird','contact','id',2606110,NULL,'2014-12-10 11:29:56','2014-12-10 11:29:56',NULL),(218,103,'moneybird','contact','customerid',104,NULL,'2014-12-10 11:29:57','2014-12-10 11:29:57',NULL),(219,103,'moneybird','contact','id',2606111,NULL,'2014-12-10 11:29:57','2014-12-10 11:29:57',NULL),(220,101,'hosting',NULL,'hosting_info',NULL,'<div>DATABASE:</div><div>define(\'DB_NAME\', \'chapman_db\');</div><div><br></div><div>/** MySQL database username */</div><div>define(\'DB_USER\', \'chapman_usr\');</div><div><br></div><div>/** MySQL database password */</div><div>define(\'DB_PASSWORD\', \'RxDuR2dDe\');</div><div><br></div><div><br></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Username:&nbsp; &nbsp; &nbsp; &nbsp;chapman</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;DcOp6z3q</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Domain:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><a href=\"http://chapmantenders.com/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">chapmantenders.com</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">To log in immediately, follow this link, using your username and password:</span></div><div><br></div><div><a href=\"http://178.18.143.75:2222/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">http://178.18.143.75:2222</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Once your domain resolves, you will be able to follow this link:</span></div><div><br></div><div><a href=\"http://www.chapmantenders.com:2222/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">http://www.chapmantenders.com:2222</span></a></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Bandwidth:&nbsp; &nbsp; &nbsp; 20000 Megabytes</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Disk Space:&nbsp; &nbsp; &nbsp;10000 Megabytes</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Virtual Domains:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Subdomains:&nbsp; &nbsp; &nbsp;unlimited</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">POP Email Accounts:&nbsp; &nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Email Forwarders:&nbsp; &nbsp; &nbsp; &nbsp;5</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Email Autoresponders:&nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Email Mailing Lists:&nbsp; &nbsp; 10</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">POP Server:&nbsp; &nbsp; &nbsp;</span><a href=\"http://mail.chapmantenders.com/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">mail.chapmantenders.com</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">SMTP Server:&nbsp; &nbsp;&nbsp;</span><a href=\"http://mail.chapmantenders.com/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">mail.chapmantenders.com</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Login:&nbsp;&nbsp;chapman</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;DcOp6z3q</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">FTP accounts:&nbsp; &nbsp;3</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Anonymous FTP:&nbsp; OFF</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">FTP Server:&nbsp; &nbsp; &nbsp;</span><a href=\"http://ftp.chapmantenders.com/\"><span style=\"color: rgb(17, 85, 204); font-family: arial, sans-serif;\">ftp.chapmantenders.com</span></a></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Login:&nbsp;&nbsp;chapman</span></div><div><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Password:&nbsp; &nbsp; &nbsp; &nbsp;DcOp6z3q</span></div>','2014-12-10 11:30:48','2014-12-10 11:30:48',NULL),(221,104,'moneybird','contact','customerid',106,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL),(222,104,'moneybird','contact','id',2626585,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL),(223,105,'moneybird','contact','customerid',105,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL),(224,105,'moneybird','contact','id',2612411,NULL,'2014-12-16 12:57:18','2014-12-16 12:57:18',NULL),(225,77,'hosting',NULL,'hosting_info',NULL,'<div>:p</div>','2014-12-18 08:21:38','2014-12-18 08:21:38',NULL),(226,98,'hosting',NULL,'hosting_info',NULL,'<div><span style=\"color: rgb(34, 34, 34);\">Username:&nbsp; &nbsp; &nbsp; &nbsp;vanquish</span></div><div><span style=\"color: rgb(34, 34, 34);\">Password:&nbsp; &nbsp; &nbsp; &nbsp;06YfNKIWXz</span></div><div><span style=\"color: rgb(34, 34, 34);\">Domain:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><u><a href=\"http://vanquish-yachts.com/\"><span style=\"color: rgb(17, 85, 204);\">vanquish-yachts.com</span></a></u></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">To log in immediately, follow this link, using your username and password:</span></div><div><br></div><div><u><a href=\"http://178.18.143.75:2222/\"><span style=\"color: rgb(17, 85, 204);\">http://178.18.143.75:2222</span></a></u></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">Once your domain resolves, you will be able to follow this link:</span></div><div><br></div><div><u><a href=\"http://www.vanquish-yachts.com:2222/\"><span style=\"color: rgb(17, 85, 204);\">http://www.vanquish-yachts.com:2222</span></a></u></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">Bandwidth:&nbsp; &nbsp; &nbsp; 20000 Megabytes</span></div><div><span style=\"color: rgb(34, 34, 34);\">Disk Space:&nbsp; &nbsp; &nbsp;10000 Megabytes</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">Virtual Domains:&nbsp; &nbsp; &nbsp; &nbsp; unlimited</span></div><div><span style=\"color: rgb(34, 34, 34);\">Subdomains:&nbsp; &nbsp; &nbsp;unlimited</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">POP Email Accounts:&nbsp; &nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34);\">Email Forwarders:&nbsp; &nbsp; &nbsp; &nbsp;5</span></div><div><span style=\"color: rgb(34, 34, 34);\">Email Autoresponders:&nbsp; &nbsp;20</span></div><div><span style=\"color: rgb(34, 34, 34);\">Email Mailing Lists:&nbsp; &nbsp; 10</span></div><div><span style=\"color: rgb(34, 34, 34);\">POP Server:&nbsp; &nbsp; &nbsp;</span><u><a href=\"http://mail.vanquish-yachts.com/\"><span style=\"color: rgb(17, 85, 204);\">mail.vanquish-yachts.com</span></a></u></div><div><span style=\"color: rgb(34, 34, 34);\">SMTP Server:&nbsp; &nbsp;&nbsp;</span><u><a href=\"http://mail.vanquish-yachts.com/\"><span style=\"color: rgb(17, 85, 204);\">mail.vanquish-yachts.com</span></a></u></div><div><span style=\"color: rgb(34, 34, 34);\">Login:&nbsp; vanquish</span></div><div><span style=\"color: rgb(34, 34, 34);\">Password:&nbsp; &nbsp; &nbsp; &nbsp;06YfNKIWXz</span></div><div><br></div><div><span style=\"color: rgb(34, 34, 34);\">FTP accounts:&nbsp; &nbsp;3</span></div><div><span style=\"color: rgb(34, 34, 34);\">Anonymous FTP:&nbsp; OFF</span></div><div><span style=\"color: rgb(34, 34, 34);\">FTP Server:&nbsp; &nbsp; &nbsp;</span><u><a href=\"http://ftp.vanquish-yachts.com/\"><span style=\"color: rgb(17, 85, 204);\">ftp.vanquish-yachts.com</span></a></u></div><div><span style=\"color: rgb(34, 34, 34);\">Login:&nbsp; vanquish</span></div><div><span style=\"color: rgb(34, 34, 34);\">Password:&nbsp; &nbsp; &nbsp; &nbsp;06YfNKIWXz</span></div>','2014-12-24 09:58:09','2014-12-24 09:58:09',NULL);
/*!40000 ALTER TABLE `companymeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emailusage`
--

DROP TABLE IF EXISTS `emailusage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emailusage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(10) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `period` date DEFAULT NULL,
  `cnt` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emailusage_subscriptions1_idx` (`subscription_id`),
  CONSTRAINT `fk_emailusage_subscriptions1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emailusage`
--

LOCK TABLES `emailusage` WRITE;
/*!40000 ALTER TABLE `emailusage` DISABLE KEYS */;
/*!40000 ALTER TABLE `emailusage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_periods`
--

DROP TABLE IF EXISTS `invoice_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_periods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_periods`
--

LOCK TABLES `invoice_periods` WRITE;
/*!40000 ALTER TABLE `invoice_periods` DISABLE KEYS */;
INSERT INTO `invoice_periods` VALUES (1,'yearly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'trimestral','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'quarterly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'monthly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `invoice_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_02_05_024934_confide_setup_users_table',1),('2013_02_05_043505_create_posts_table',1),('2013_02_05_044505_create_comments_table',1),('2013_02_08_031702_entrust_setup_tables',1),('2013_05_21_024934_entrust_permissions',1),('2014_10_17_082031_create_service_categories_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_role_permission_id_role_id_unique` (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,6,2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`),
  UNIQUE KEY `permissions_display_name_unique` (`display_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'manage_blogs','manage blogs'),(2,'manage_posts','manage posts'),(3,'manage_comments','manage comments'),(4,'manage_users','manage users'),(5,'manage_roles','manage roles'),(6,'post_comment','post comment');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_index` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Lorem ipsum dolor sit amet','lorem-ipsum-dolor-sit-amet','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?','meta_title1','meta_description1','meta_keywords1','2014-10-03 10:13:12','2014-10-03 10:13:12'),(2,1,'Vivendo suscipiantur vim te vix','vivendo-suscipiantur-vim-te-vix','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?','meta_title2','meta_description2','meta_keywords2','2014-10-03 10:13:12','2014-10-03 10:13:12'),(3,1,'In iisque similique reprimique eum','in-iisque-similique-reprimique-eum','In mea autem etiam menandri, quot elitr vim ei, eos semper disputationi id? Per facer appetere eu, duo et animal maiestatis. Omnesque invidunt mnesarchum ex mel, vis no case senserit dissentias. Te mei minimum singulis inimicus, ne labores accusam necessitatibus vel, vivendo nominavi ne sed. Posidonium scriptorem consequuntur cum ex? Posse fabulas iudicabit in nec, eos cu electram forensibus, pro ei commodo tractatos reformidans. Qui eu lorem augue alterum, eos in facilis pericula mediocritatem?\n\nEst hinc legimus oporteat in. Sit ei melius delicatissimi. Duo ex qualisque adolescens! Pri cu solum aeque. Aperiri docendi vituperatoribus has ea!\n\nSed ut ludus perfecto sensibus, no mea iisque facilisi. Choro tation melius et mea, ne vis nisl insolens. Vero autem scriptorem cu qui? Errem dolores no nam, mea tritani platonem id! At nec tantas consul, vis mundi petentium elaboraret ex, mel appareat maiestatis at.\n\nSed et eros concludaturque. Mel ne aperiam comprehensam! Ornatus delicatissimi eam ex, sea an quidam tritani placerat? Ad eius iriure consequat eam, mazim temporibus conclusionemque eum ex.\n\nTe amet sumo usu, ne autem impetus scripserit duo, ius ei mutat labore inciderint! Id nulla comprehensam his? Ut eam deleniti argumentum, eam appellantur definitionem ad. Pro et purto partem mucius!\n\nCu liber primis sed, esse evertitur vis ad. Ne graeco maiorum mea! In eos nostro docendi conclusionemque. Ne sit audire blandit tractatos? An nec dicam causae meliore, pro tamquam offendit efficiendi ut.\n\nTe dicta sadipscing nam, denique albucius conclusionemque ne usu, mea eu euripidis philosophia! Qui at vivendo efficiendi! Vim ex delenit blandit oportere, in iriure placerat cum. Te cum meis altera, ius ex quis veri.\n\nMutat propriae eu has, mel ne veri bonorum tincidunt. Per noluisse sensibus honestatis ut, stet singulis ea eam, his dicunt vivendum mediocrem ei. Ei usu mutat efficiantur, eum verear aperiam definitiones an! Simul dicam instructior ius ei. Cu ius facer doming cotidieque! Quot principes eu his, usu vero dicat an.\n\nEx dicta perpetua qui, pericula intellegam scripserit id vel. Id fabulas ornatus necessitatibus mel. Prompta dolorem appetere ea has. Vel ad expetendis instructior!\n\nTe his dolorem adversarium? Pri eu rebum viris, tation molestie id pri. Mel ei stet inermis dissentias. Sed ea dolorum detracto vituperata. Possit oportere similique cu nec, ridens animal quo ex?','meta_title3','meta_description3','meta_keywords3','2014-10-03 10:13:12','2014-10-03 10:13:12');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `jira_id` varchar(45) DEFAULT NULL,
  `roadmap_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_companies1_idx` (`company_id`),
  CONSTRAINT `fk_projects_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (2,28,'1222',659031,'eenvoudcrm','none','non','OK','2014-10-20 12:20:40','2014-10-28 12:00:44','2014-10-28 12:00:44'),(7,28,'123',NULL,'testor','test','test','OK','0000-00-00 00:00:00','2014-10-28 11:50:05','2014-10-28 11:50:05'),(8,28,'12',NULL,'1','13','12','1','0000-00-00 00:00:00','2014-10-28 08:47:05','2014-10-28 08:47:05'),(22,28,'10201',NULL,'eenvoudcrm','le crm','thx','','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(36,28,'-1',NULL,'Overig JIRA','Onbekende JIRA projecten','Required','','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(41,28,'10102',NULL,'Diverse Projecten','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reminders_users1_idx` (`user_id`),
  KEY `fk_reminders_projects1_idx` (`project_id`),
  CONSTRAINT `fk_reminders_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_reminders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

LOCK TABLES `reminders` WRITE;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
INSERT INTO `reminders` VALUES (13,22,4,'test all teh things','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(18,22,4,'clean js','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(20,22,4,'verify cascading rules','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(21,22,4,'verify routes out of place','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2014-10-03 10:13:12','2014-10-03 10:13:12'),(2,'comment','2014-10-03 10:13:12','2014-10-03 10:13:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_categories`
--

LOCK TABLES `service_categories` WRITE;
/*!40000 ALTER TABLE `service_categories` DISABLE KEYS */;
INSERT INTO `service_categories` VALUES (1,'Webhosting','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(2,'Emailhosting','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(3,'Domeinen','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(4,'Onderhoudscontract','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(5,'Strippenkaart','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(6,'Nieuwsbrieven','2014-10-17 06:27:36','2014-10-17 06:27:36',NULL),(7,'Filehosting','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `service_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `invoice_periods_id` int(10) NOT NULL,
  `status_id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `default_monthly_costs` varchar(45) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_services_service_categories1_idx` (`category_id`),
  KEY `fk_services_statuses1_idx` (`status_id`),
  KEY `fk_services_invoice_periods1_idx` (`invoice_periods_id`),
  CONSTRAINT `fk_services_invoice_periods1` FOREIGN KEY (`invoice_periods_id`) REFERENCES `invoice_periods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_services_service_categories1` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_services_statuses1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (16,0,4,2,'batmal','2',NULL,'2014-10-16 12:00:17','2014-10-17 06:16:26','2014-10-17 06:16:26'),(17,1,4,2,'Standaard','19',NULL,'2014-10-17 06:16:15','2014-10-17 06:54:13',NULL),(18,2,4,2,'Standaard','6',NULL,'2014-10-17 06:51:55','2014-10-17 06:53:59',NULL),(19,2,4,2,'Google Apps Business account','6',NULL,'2014-10-17 06:53:47','2014-10-17 06:53:47',NULL),(20,3,1,2,'.nl','1.5',NULL,'2014-10-17 06:55:13','2014-10-17 06:55:13',NULL),(21,4,4,2,'Wordpress','15',NULL,'2014-10-17 06:56:08','2014-10-17 06:56:08',NULL),(22,5,4,2,'4 uur - 75% korting','240',NULL,'2014-10-17 06:59:17','2014-10-17 06:59:17',NULL),(23,5,4,2,'8 uur - 70% korting','448',NULL,'2014-10-17 07:00:13','2014-10-17 07:03:34',NULL),(24,5,4,2,'16 uur - 65% korting','832',NULL,'2014-10-17 07:02:29','2014-10-17 07:03:40',NULL),(25,5,4,2,'32 uur - 60% korting','1536',NULL,'2014-10-17 07:03:04','2014-10-17 07:03:04',NULL),(26,4,4,2,'Op maat','0',NULL,'2014-10-17 07:05:35','2014-10-17 07:05:35',NULL),(27,3,1,2,'SSL certificaat - SSL DV Mobiel - 1 jaar','8',NULL,'2014-10-17 07:09:29','2014-10-17 07:09:29',NULL),(28,6,4,2,'Wordpress Nieuwsbriefsysteem','20',NULL,'2014-10-17 07:17:24','2014-10-17 07:20:56',NULL),(29,3,1,2,'.com','1.5',NULL,'2014-10-17 07:21:59','2014-10-17 07:21:59',NULL),(30,3,1,2,'.be','1.5',NULL,'2014-10-17 07:22:07','2014-10-17 07:22:07',NULL),(31,1,4,2,'WordPress Plugin','0',NULL,'0000-00-00 00:00:00',NULL,NULL),(32,1,4,2,'Amazon VPS','45','','0000-00-00 00:00:00',NULL,NULL),(33,1,4,2,'Dedicated','149','','0000-00-00 00:00:00',NULL,NULL),(34,3,1,2,'.net','1.5','','0000-00-00 00:00:00',NULL,NULL),(35,3,1,2,'.org','1.5','','0000-00-00 00:00:00',NULL,NULL),(36,7,4,2,'Dropbox','11.50','','0000-00-00 00:00:00',NULL,NULL),(37,3,1,2,'.eu','1.5','','0000-00-00 00:00:00',NULL,NULL),(38,3,1,2,'.de','1.5','','0000-00-00 00:00:00',NULL,NULL),(39,3,1,2,'.info','1.5','','0000-00-00 00:00:00',NULL,NULL),(40,3,1,2,'.es','2','','0000-00-00 00:00:00',NULL,NULL),(41,3,1,2,'.fr','2','','0000-00-00 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'terminated','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'yearly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'trimestral','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'quarterly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,'monthly','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(6,'ended','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strippenkaarten`
--

DROP TABLE IF EXISTS `strippenkaarten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `strippenkaarten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoice_code` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_strippenkaarten_companies1_idx` (`company_id`),
  CONSTRAINT `fk_strippenkaarten_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strippenkaarten`
--

LOCK TABLES `strippenkaarten` WRITE;
/*!40000 ALTER TABLE `strippenkaarten` DISABLE KEYS */;
INSERT INTO `strippenkaarten` VALUES (20,28,4,240,0,'','2014-11-07','2014-12-02','0000-00-00 00:00:00','2014-12-02 12:01:14',NULL),(21,28,16,832,0,'','2014-11-07',NULL,'0000-00-00 00:00:00','2014-12-02 15:52:13',NULL),(23,28,4,240,0,'','2014-11-19','2014-11-19','0000-00-00 00:00:00','2014-11-19 17:20:30',NULL),(24,28,4,240,0,'','2014-11-20',NULL,'0000-00-00 00:00:00','2014-11-24 13:25:30',NULL),(25,28,4,240,0,'','2014-11-20',NULL,'0000-00-00 00:00:00','2014-11-24 08:41:57',NULL),(27,28,4,240,0,'','2014-11-21',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(32,28,16,832,0,'','2014-12-05',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `strippenkaarten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `subscription_start` date DEFAULT NULL,
  `subscription_end` date DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `invoice_code` varchar(255) DEFAULT NULL,
  `invoice_periods_id` int(10) NOT NULL,
  `status_id` int(10) NOT NULL DEFAULT '1',
  `status_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subscriptions_services1_idx` (`service_id`),
  KEY `fk_subscriptions_companies1_idx` (`company_id`),
  KEY `fk_subscriptions_status1_idx` (`status_id`),
  KEY `fk_subscriptions_invoice_periods1_idx` (`invoice_periods_id`),
  CONSTRAINT `fk_subscriptions_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscriptions_invoice_periods1` FOREIGN KEY (`invoice_periods_id`) REFERENCES `invoice_periods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscriptions_services1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscriptions_status1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (69,91,17,'amfico.nl',19,'2014-11-01','2014-12-31',38,3769949,'2014-0167',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:41',NULL),(70,40,28,'',15,'2014-09-01','2014-12-31',60,3448021,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:41',NULL),(75,35,17,'flowcharging.com',19,'2014-01-01','2014-12-31',228,2242613,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:41',NULL),(76,35,29,'flowcharging.com',1.5,'2014-01-01','2014-12-31',18,2242613,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:41',NULL),(80,35,31,'WooCommerce Mollie',0,'2015-01-01','2016-01-01',49.5,NULL,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:41',NULL),(81,35,31,'Composite Products',0,'2015-01-01','2016-01-01',39.5,NULL,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(82,35,20,'chargingflow.nl',1.5,'2014-01-01','2014-12-31',18,2242613,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(83,35,20,'flow-charging.nl',1.5,'2014-01-01','2014-12-31',18,2242613,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(84,35,20,'flow-nederland.nl',1.5,'2014-01-01','2014-12-31',18,2242613,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(85,35,20,'flowcharging.nl',1.5,'2014-01-01','2014-12-31',18,2242613,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(100,35,31,'Zopim chatmodule',13,'2014-10-01','2014-12-31',39,3534378,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(101,35,26,'WordPress en WooCommerce updates',45,'2014-12-01','2014-12-31',45,3797256,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(102,30,17,'efdonline.nl',19,'2014-11-26','2014-12-31',38,3842598,'',4,2,'2014-12-01','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(107,4,17,'zustersliefde.nl',19,'2014-06-01','2014-12-31',228,2878411,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(108,4,20,'zustersliefde.nl',1.5,'2014-06-01','2014-12-31',18,2878411,'',1,2,'2014-12-09','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(109,7,32,'Alda Data systeem',45,'2014-11-28','2014-12-31',45,NULL,'',4,2,NULL,'0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(110,13,33,'Verbruiksanalyse',74.5,'2015-01-01','2016-01-01',894,NULL,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(111,13,20,'verbruiksanalyse.nl',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(114,13,20,'omzetstatistieken.nl',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(117,14,33,'omzetstatistieken.be',74.5,'2015-01-01','2016-01-01',894,NULL,'',4,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(118,14,30,'analyse-utilisation.be',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(119,14,30,'statistiques-utilisation.be',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(120,14,30,'omzetstatistieken.be',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(121,14,30,'verbruiksanalyse.be',1.5,'2015-01-01','2016-01-01',18,NULL,'',1,2,'0000-00-00','0000-00-00 00:00:00','2014-11-28 09:07:42',NULL),(122,91,17,'amfico.nl',19,'2014-11-28','2014-12-31',38,3769949,'',4,2,'2014-12-01','0000-00-00 00:00:00','2014-11-28 09:07:43',NULL),(124,94,20,'patientenplatformurticaria.nl',1.5,'2014-12-22','2014-12-31',3,NULL,'',1,1,'2014-12-22','0000-00-00 00:00:00','2014-12-01 11:14:59',NULL),(125,94,34,'patientenplatformurticaria.net',1.5,'2014-12-22','2014-12-31',1.5,NULL,'',1,1,'2014-12-22','0000-00-00 00:00:00','2014-12-01 11:14:59',NULL),(126,94,20,'urticariaplatform.nl',1.5,'2014-12-22','2014-12-31',1.5,NULL,'',1,1,'2014-12-22','0000-00-00 00:00:00','2014-12-01 11:14:59',NULL),(127,94,20,'geefurticariaeengezicht.nl',1.5,'2014-12-22','2014-12-31',1.5,NULL,'',1,1,'2014-12-22','0000-00-00 00:00:00','2014-12-01 11:14:59',NULL),(128,94,17,'patientenplatformurticaria.nl',19,'2014-12-22','2014-12-31',19,NULL,'',4,1,'2014-12-01','0000-00-00 00:00:00','2014-12-01 11:14:59',NULL),(139,97,20,'poortertandartsen.nl',1.5,'2014-11-27','2015-11-27',18,3892834,NULL,1,2,'2014-11-27','0000-00-00 00:00:00','2014-11-28 09:07:43',NULL),(140,97,17,'poortertandartsen.nl',19,'2014-11-27','2015-11-27',228,3892834,NULL,4,2,'2014-11-27','0000-00-00 00:00:00','2014-11-28 09:07:43',NULL),(141,97,19,'info@poortertandartsen.nl',6,'2014-11-27','2015-11-27',72,3892834,NULL,4,2,'2014-11-27','0000-00-00 00:00:00','2014-11-28 09:07:43',NULL),(142,70,20,'dezone.nl',0,'2014-08-01','2014-12-31',15,3295999,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(143,70,17,'www.dezone.nl',19,'2014-09-01','2014-12-31',76,3296017,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(144,70,19,'info@dezone.nl',6,'2014-09-01','2014-12-31',24,3296017,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(145,22,17,'dekikkert.nl en dekikkert.de',19,'2014-06-01','2014-12-31',133,3939533,NULL,4,1,'2014-12-09','0000-00-00 00:00:00','2014-12-01 15:22:09',NULL),(146,38,20,'hofmanshelp.nl',1.5,'2014-07-01','2014-12-31',9,3049235,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(147,38,35,'hofmans',1.5,'2014-07-01','2014-12-31',9,3049235,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(148,38,17,'www.hofmanshelpt.nl',19,'2014-07-01','2014-12-31',114,3049235,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(149,38,21,'www.hofmanshelpt.nl',20,'2014-07-01','2014-12-31',120,3049235,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(150,39,17,'www.hotelnothotel.com',19,'2014-04-01','2015-03-31',228,2751221,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(151,50,17,'www.mecta.nl',19,'2014-09-01','2014-12-31',76,3297272,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(152,54,17,'',25,'2014-01-01','2014-12-31',300,2242723,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(153,54,18,'IMAP',25,'2014-01-01','2014-12-31',300,2242723,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(154,54,36,'',11.5,'2014-01-01','2014-12-31',138,2242723,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(155,54,20,'geenmuseumnacht.nl',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(156,54,20,'museautrecht.nl',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(157,54,20,'museumsutrecht.nl',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(158,54,20,'utrechtmusea.nl',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(159,54,29,'utrechtmusea.com',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(160,54,29,'utrechtmuseums.com',1.5,'2014-01-01','2014-12-31',18,2242723,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(161,57,37,'pharmatube.eu',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(162,57,30,'pharmatube.be',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(163,57,38,'pharmatube.de',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(164,57,34,'pharmatube.net',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(165,57,35,'pharmatube.org',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(166,57,39,'pharmatube.info',1.5,'2014-01-01','2014-12-31',18,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(167,57,40,'pharmatube.es',2,'2014-01-01','2014-12-31',24,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(168,28,21,'test fakor',15,'2013-12-01','2014-12-01',180,NULL,NULL,4,6,'2014-12-03','0000-00-00 00:00:00','2014-12-03 15:53:21',NULL),(169,57,41,'pharmatube.fr',2,'2014-01-01','2014-12-31',24,2827002,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(170,57,17,'pharmatube.nl',19,'2014-01-01','2014-12-31',228,2827002,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(171,59,18,'www.profluid.nl',19,'2014-01-01','2014-12-31',228,2242971,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(172,59,18,'profluid.nl',6,'2014-01-01','2014-12-31',72,2242971,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(173,59,20,'profluid.nl',1.5,'2014-01-01','2014-12-31',18,2242971,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(174,79,17,'www.rekenhuys.nl',19,'2014-01-01','2014-12-31',228,2242947,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(175,79,20,'rekenhuys.nl',1.5,'2014-01-01','2014-12-31',18,2242947,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(176,63,17,'www.roosco.nl',19,'2014-01-01','2014-12-31',228,2242844,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(177,63,29,'chocoladeverleiding.com',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(178,63,20,'clubvandemammas.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(179,63,20,'kantoorhurenhoorn.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(180,63,20,'lepelaar5.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(181,63,20,'meerdanmamma.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(182,63,20,'roosco.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(183,63,20,'corporatelifeplanner.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(184,63,20,'corporatelifeplanners.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(185,63,20,'corporatelifeplanning.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(186,63,20,'roosencommunicatie.nl',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(187,63,29,'yourchocolatetemptaion.com',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(188,63,29,'yournicky.com',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(189,63,29,'yoursleepybag.com',1.5,'2014-01-01','2014-12-31',18,2242844,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(190,66,17,'soli-infra.nl en soli-infra.de',19,'2014-05-01','2014-12-31',152,2661110,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(191,66,19,'olaarhuis@soli-infra.nl',6,'2014-05-01','2014-12-31',48,2952393,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(192,66,19,'mvanbree@soli-infra.nl',6,'2014-05-01','2014-12-31',48,2952393,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(193,66,19,'mvanlokven@soli-infra.nl',6,'2014-06-01','2014-12-31',42,3036644,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(194,66,19,'hvanlonden@soli-infra.nl',6,'2014-06-01','2014-12-31',42,3036644,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(195,66,19,'shendriks@soli-infra.nl',6,'2014-11-01','2014-12-31',42,3680719,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(196,66,19,'yweinem@soli-infra.de',6,'2014-12-01','2014-12-31',6,3805178,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(197,66,19,'fdeweerd@soli-infra.nl',6,'2014-06-01','2014-12-31',48,2952393,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(198,66,19,'pprinsen@soli-infra.nl',6,'2014-06-01','2014-12-31',48,2952393,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(199,67,17,'sorpasso en beconvincing',19,'2014-01-01','2014-12-31',228,2242860,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(200,67,20,'beconvincing.nl',1.5,'2014-01-01','2014-12-31',18,2242860,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(201,67,20,'company-dating.nl',1.5,'2014-01-01','2014-12-31',18,2242860,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(202,67,20,'companydating.nl',1.5,'2014-01-01','2014-12-31',18,2242860,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(203,67,20,'me-marketing.nl',1.5,'2014-01-01','2014-12-31',18,2242860,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(204,67,29,'beconvincing.com',1.5,'2014-08-01','2015-08-01',19.5,3230156,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(205,100,20,'force15.nl',1.5,'2014-01-01','2014-12-31',18,2242802,NULL,1,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(206,100,20,'tardix.nl',1.5,'2014-01-01','2014-12-31',18,2242802,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(207,100,29,'tardixtrading.com',1.5,'2014-01-01','2014-12-31',18,2242802,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(208,100,20,'tardixtrading.nl',1.5,'2014-01-01','2014-12-31',18,2242802,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(209,100,17,'stormyachts.com',19,'2014-01-01','2014-12-31',228,2242792,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(210,100,29,'stormyachts.com',1.5,'2014-01-01','2014-12-31',18,2242792,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(211,100,29,'storm-yachts.com',1.5,'2014-01-01','2014-12-31',18,2242792,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(212,100,20,'storm-yachts.nl',1.5,'2014-01-01','2014-12-31',18,2242792,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(213,100,20,'stormyachts.nl',1.5,'2014-01-01','2014-12-31',18,2242792,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(214,76,18,'thinkbananas.nl',10,'2014-01-01','2014-12-31',120,2286673,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(215,76,18,'thinkbananas.nl',0,'2014-01-01','2014-12-31',0,2286673,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(216,81,17,'www.vaarbewijsopleidingen.nl',19,'2014-10-01','2014-12-31',57,3623243,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(217,81,20,'vaarbewijsopleidingen.nl',1.5,'2014-10-01','2014-12-31',4.5,3623243,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(218,81,19,'info@vaarbewijsopleidingen.nl',6,'2014-10-01','2014-12-31',18,3623243,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(219,72,17,'www.westzijde.nl',19,'2014-01-01','2014-12-31',228,2242769,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(220,72,21,'www.westzijde.nl',20,'2014-04-01','2014-12-31',180,2661097,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(221,85,17,'www.whatifolution.com',19,'2014-01-01','2014-12-31',228,2242777,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(222,87,28,'',20,'2014-01-01','2014-12-31',240,2293628,NULL,4,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(223,73,21,'www.tandartszoetermeer.nl',15,'2014-04-01','2014-12-31',135,2676425,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(224,98,17,'',19,'2014-12-01','2014-12-31',19,3882982,NULL,4,2,'2015-01-02','0000-00-00 00:00:00','2015-01-02 08:12:23',NULL),(225,98,21,'',29,'2014-12-01','2014-12-31',29,3882982,NULL,4,2,'2015-01-02','0000-00-00 00:00:00','2015-01-02 08:12:23',NULL),(226,98,19,'6 accounts',36,'2014-12-01','2014-12-31',36,3882982,NULL,4,2,'2015-01-02','0000-00-00 00:00:00','2015-01-02 08:12:23',NULL),(227,77,20,'yourperfectsummer.nl',1.5,'2015-01-01','2015-12-31',18,NULL,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(228,77,20,'sixwordsamenvatting.nl',1.5,'2015-01-01','2015-12-31',18,NULL,NULL,1,2,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(229,77,20,'zanussi-teamwash.nl',1.5,'2015-01-01','2015-12-31',18,NULL,NULL,1,1,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(230,77,30,'zanussi-teamwash.be',1.5,'2015-01-01','2015-12-31',18,NULL,NULL,1,1,'2014-12-01','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(233,4,19,'info@zustersliefde.nl',6,'2014-06-01','2014-12-31',42,2878411,NULL,4,2,'2014-12-09','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(234,4,20,'zusterliefde.nl',1.5,'2014-06-01','2014-12-31',18,2878411,NULL,1,2,'2014-12-09','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(235,101,29,'chapmantenders.com',1.5,'2014-12-10','2015-12-10',18,3965721,NULL,1,2,'2014-12-10','0000-00-00 00:00:00','2014-12-10 13:07:58',NULL),(236,101,17,'www.chapmantenders.com',19,'2014-12-10','2015-12-10',228,3965721,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','2014-12-10 13:07:58',NULL),(237,101,19,'1 account',6,'2014-12-10','2015-12-09',72,3965721,NULL,4,2,'2014-12-10','0000-00-00 00:00:00','2014-12-10 13:07:58',NULL),(239,101,19,'1 account',6,'2014-12-10','2015-12-09',72,3965721,NULL,4,2,'2014-12-10','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(240,104,28,'wiegmans.eenvoudmedia.nl',15,'2014-12-16','2015-12-15',180,4022467,NULL,4,2,'0000-00-00','0000-00-00 00:00:00','2014-12-16 13:03:23',NULL),(241,30,19,'maurice@efdonline.nl',6,'2014-12-18','2015-12-17',72,4037491,NULL,4,2,'2014-12-19','0000-00-00 00:00:00','2014-12-18 09:39:01',NULL);
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `jira_user_id` int(11) DEFAULT NULL,
  `roadmap_resource_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@example.org','$2y$10$r6414fiEOvrszNWF/oC48OsmIdQktsU2A1066M8clmmOcc1F7fvCu','5c0b3241b57ee1a09c94adb799c63d5d',NULL,1,NULL,NULL,'2014-10-03 10:13:12','2014-10-03 10:13:12'),(2,'user','user@example.org','$2y$10$i37T1bRpN5w//jsZbvWvdepbfpcFBwdYUIMZNT2GeeILv96aEVYUO','bab64869e676cd65b0db5151bf540fd1','1mT7pJtqhqYHPbQSj1tlNEURLj9uDsG4WGp185Ib6QTQQ4cm00PD7M4zVObC',1,NULL,NULL,'2014-10-03 10:13:12','2014-10-03 10:15:12'),(3,'jasper','jasper@eenvoudmedia.nl','$2y$10$wBz2DjYK45c.mT4Ti9Ds1OQp.84UHrfZg.0mfmGRDnyYSPd8RfKJe','40ca3279d0897290f7cc93c5d4937a85','hhZCRVFqMJE4r1u2g1BT9qHF4UEERxGDvyUnTb4njzgO6u0pyS6YHIP6bEe7',1,NULL,716200,'2014-10-03 10:15:45','2014-10-06 10:28:06'),(4,'andre','andre@eenvoudmedia.nl','$2y$10$81sKJrEi7uS7FfH0CFzgeO8Y6z3zkWCMBOW9FdjDVQrhH.upIlYDG','fffcdc335fa488b33d10f78b7dd78989','DR5V0AjqE20C03gokpxdAY2wZhkqVXUr4yEn8t9LGzIkbYQmetIPj6R0DmaO',1,NULL,716215,'2014-10-06 08:24:31','2014-11-28 12:13:55'),(5,'ellen','ellen@eenvoudmedia.nl','$2y$10$VJZ9yPoJ1xwF.Cs.NDLl1OQDNYvW.DJYOxtIEMOtMWJ28XaA/vHtW','0037476cf32298a62ea45fe1b2c3e1f4','cqoEYXsGKdAmMCyKa8liBVxOKtGb0pOeNf5Tbz8ZGqOm40EPLofsS3J2GinH',1,NULL,NULL,'2014-11-28 12:13:45','2014-11-28 12:17:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worklogs`
--

DROP TABLE IF EXISTS `worklogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worklogs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) NOT NULL,
  `project_id` int(10) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `minutes` int(11) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  `comment` text,
  `billable` tinyint(4) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `processed` tinyint(4) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `strippenkaarten_id` int(10) unsigned DEFAULT NULL,
  `roadmap_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_worklog_projects1_idx` (`project_id`),
  KEY `fk_worklog_strippenkaarten1_idx` (`strippenkaarten_id`),
  KEY `fk_worklogs_users1_idx` (`user_id`),
  KEY `fk_worklogs_companies1_idx` (`company_id`),
  CONSTRAINT `fk_worklog_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_worklogs_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_worklogs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_worklog_strippenkaarten1` FOREIGN KEY (`strippenkaarten_id`) REFERENCES `strippenkaarten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worklogs`
--

LOCK TABLES `worklogs` WRITE;
/*!40000 ALTER TABLE `worklogs` DISABLE KEYS */;
INSERT INTO `worklogs` VALUES (150,1,NULL,3,120,' [for deleted to-do: \"test for andre\"]','',1,'2014-12-10',0,NULL,NULL,2668911,'2014-12-10 10:00:02','2014-12-10 10:00:02',NULL),(151,28,22,4,120,'Issue 10393 - Page Werklogs, 3 improvements, see screenshot','',1,'2014-12-12',0,4046710,NULL,NULL,'2014-12-12 12:34:49','2014-12-19 13:07:00',NULL),(154,1,NULL,5,60,'','',1,'2014-12-24',0,NULL,NULL,2728204,'2014-12-24 10:00:02','2014-12-24 10:00:02',NULL);
/*!40000 ALTER TABLE `worklogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-05 12:22:00
