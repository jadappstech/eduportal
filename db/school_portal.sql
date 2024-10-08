-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: school_portal
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher` varchar(128) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `file` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` VALUES (1,'7','jss2','mathematics',NULL,NULL),(2,'7','jss2','english language',NULL,NULL),(3,'7','sss1','mathematics',NULL,NULL),(4,'5','','','Introduction to Number System','Test document.pdf'),(5,'5','jss2','mathematics','Introduction to Number System','Test document.pdf'),(6,'5','','','Introduction to Number System','Test document.pdf'),(7,'5',NULL,NULL,'Number System','Test document.pdf'),(8,'5',NULL,NULL,'intro to Number System','Test document.pdf'),(9,'5',NULL,NULL,'Introduction to Number system','Test document.pdf'),(10,'5',NULL,NULL,'Introduction to Number system','Test document.pdf'),(11,'5',NULL,NULL,'Introduction to Number system','Test document.pdf'),(12,'5',NULL,NULL,'Introduction to Number system','Test document.pdf'),(13,'5',NULL,NULL,'Introduction to Number system','Test document.pdf'),(14,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(15,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(16,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(17,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(18,'5',NULL,'mathematics','Introduction to Number System','Test document.pdf'),(19,'5',NULL,'mathematics','Introduction to Number System','Test document.pdf'),(20,'5',NULL,'mathematics','Introduction to Number System','Test document.pdf'),(21,'5','basic5','chem','Introduction to Organic chemistry','Test document.pdf'),(22,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(23,'5',NULL,'mathematics','Introduction to Number system','Test document.pdf'),(24,'5','basic5','mathematics','Introduction to Number System','Test document.pdf'),(25,'5','prenursery','mathematics','XYZ','Test document.pdf'),(26,'5','sss3','chemistry','Organic Chemistry','Test document.pdf'),(27,'5','basic5','mathematics','dfghjkl','Test document.pdf'),(28,'5','basic5','quantitative reasoning','Question 1','Test document.pdf');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `communications`
--

DROP TABLE IF EXISTS `communications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `communications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(450) DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `uploaded_by` varchar(45) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communications`
--

LOCK TABLES `communications` WRITE;
/*!40000 ALTER TABLE `communications` DISABLE KEYS */;
INSERT INTO `communications` VALUES (1,'Hello all',NULL,NULL,1);
/*!40000 ALTER TABLE `communications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `continuous_assessment`
--

DROP TABLE IF EXISTS `continuous_assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `continuous_assessment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `first_test` varchar(45) DEFAULT NULL,
  `second_test` varchar(45) DEFAULT NULL,
  `exam` varchar(45) DEFAULT NULL,
  `term` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continuous_assessment`
--

LOCK TABLES `continuous_assessment` WRITE;
/*!40000 ALTER TABLE `continuous_assessment` DISABLE KEYS */;
INSERT INTO `continuous_assessment` VALUES (1,'mathematics',8,'20','17','56','first','2023'),(2,'mathematics',11,'12',NULL,NULL,'second','2024'),(3,'mathematics',8,'12','12','52','first','2024'),(4,'mathematics',8,NULL,NULL,'58','second','2024'),(5,'mathematics',25,'12',NULL,NULL,'first','2024'),(6,'mathematics',4,'12',NULL,NULL,'second','2024'),(7,'13',17,'52',NULL,NULL,'second','2024'),(8,'6',11,'52',NULL,NULL,'first','2024'),(9,'14',5,'76',NULL,NULL,'second','2024'),(10,'13',5,'76',NULL,NULL,'first','2024'),(11,'16',7,NULL,NULL,'52','second','2024'),(12,'15',7,'52','52',NULL,'second','2024'),(13,'14',1,'52',NULL,NULL,'second','2024'),(14,'15',5,NULL,'76',NULL,'first','2024'),(15,'14',12,NULL,'23',NULL,'','2024'),(16,'13',1,NULL,'76',NULL,'','2024'),(17,'15',12,NULL,'12',NULL,'','2024');
/*!40000 ALTER TABLE `continuous_assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_teachers`
--

DROP TABLE IF EXISTS `form_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form_teacher` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_teachers`
--

LOCK TABLES `form_teachers` WRITE;
/*!40000 ALTER TABLE `form_teachers` DISABLE KEYS */;
INSERT INTO `form_teachers` VALUES (1,'7','prenursery');
/*!40000 ALTER TABLE `form_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'male'),(2,'female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_notes`
--

DROP TABLE IF EXISTS `lesson_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `lesson_note` varchar(256) DEFAULT NULL,
  `uploaded_by` int DEFAULT NULL,
  `approved` int DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_notes`
--

LOCK TABLES `lesson_notes` WRITE;
/*!40000 ALTER TABLE `lesson_notes` DISABLE KEYS */;
INSERT INTO `lesson_notes` VALUES (1,'sss1','mathematics','Test document.pdf',7,-1,NULL),(2,'sss1','mathematics','Test document.pdf',7,-1,NULL),(3,'jss1','english','Test document.pdf',7,1,NULL),(4,'jss1','english','Test document.pdf',7,-1,NULL),(5,'sss3','mathematics','2023 CAMP PROGRAMME OUTLINE.docx',7,-1,NULL),(6,'sss1','english','2023_1 CIT 104 Practical - Exercises Questions.docx',3,-1,NULL),(7,'sss3','mathematics','Invoice-1763438.pdf',7,1,NULL),(8,'sss2','mathematics','2023_1 CIT 104 Practical - Exercises Questions.docx',5,1,NULL),(9,'jss3','english','2023_1 CIT 104 Practical - Exercises Questions.docx',3,1,NULL),(10,'jss2','mathematics','2023_1 CIT 104 Practical - Exercises Questions.docx',3,-1,NULL),(11,'jss2','mathematics','Invoice-1763438.pdf',3,1,NULL),(12,'jss1','mathematics','Invoice-1763438.pdf',7,0,NULL);
/*!40000 ALTER TABLE `lesson_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lga`
--

DROP TABLE IF EXISTS `lga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `FK` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lga`
--

LOCK TABLES `lga` WRITE;
/*!40000 ALTER TABLE `lga` DISABLE KEYS */;
INSERT INTO `lga` VALUES (1,1,'Aba North'),(2,1,'Aba South'),(3,1,'Arochukwu'),(4,1,'Bende'),(5,1,'Ikwuano'),(6,1,'Isiala Ngwa North'),(7,1,'Isiala Ngwa South'),(8,1,'Isuikwuato'),(9,1,'Obi Ngwa'),(10,1,'Ohafia'),(11,1,'Osisioma'),(12,1,'Ugwunagbo'),(13,1,'Ukwa East'),(14,1,'Ukwa West'),(15,1,'Umuahia North'),(16,1,'Umuahia South'),(17,1,'Umu Nneochi'),(18,2,'Demsa'),(19,2,'Fufure'),(20,2,'Ganye'),(21,2,'Gayuk'),(22,2,'Gombi'),(23,2,'Grie'),(24,2,'Hong'),(25,2,'Jada'),(26,2,'Larmurde'),(27,2,'Madagali'),(28,2,'Maiha'),(29,2,'Mayo Belwa'),(30,2,'Michika'),(31,2,'Mubi North'),(32,2,'Mubi South'),(33,2,'Numan'),(34,2,'Shelleng'),(35,2,'Song'),(36,2,'Toungo'),(37,2,'Yola North'),(38,2,'Yola South'),(39,3,'Abak'),(40,3,'Eastern Obolo'),(41,3,'Eket'),(42,3,'Esit Eket'),(43,3,'Essien Udim'),(44,3,'Etim Ekpo'),(45,3,'Etinan'),(46,3,'Ibeno'),(47,3,'Ibesikpo Asutan'),(48,3,'Ibiono-Ibom'),(49,3,'Ika'),(50,3,'Ikono'),(51,3,'Ikot Abasi'),(52,3,'Ikot Ekpene'),(53,3,'Ini'),(54,3,'Itu'),(55,3,'Mbo'),(56,3,'Mkpat-Enin'),(57,3,'Nsit-Atai'),(58,3,'Nsit-Ibom'),(59,3,'Nsit-Ubium'),(60,3,'Obot Akara'),(61,3,'Okobo'),(62,3,'Onna'),(63,3,'Oron'),(64,3,'Oruk Anam'),(65,3,'Udung-Uko'),(66,3,'Ukanafun'),(67,3,'Uruan'),(68,3,'Urue-Offong/Oruko'),(69,3,'Uyo'),(70,4,'Aguata'),(71,4,'Anambra East'),(72,4,'Anambra West'),(73,4,'Anaocha'),(74,4,'Awka North'),(75,4,'Awka South'),(76,4,'Ayamelum'),(77,4,'Dunukofia'),(78,4,'Ekwusigo'),(79,4,'Idemili North'),(80,4,'Idemili South'),(81,4,'Ihiala'),(82,4,'Njikoka'),(83,4,'Nnewi North'),(84,4,'Nnewi South'),(85,4,'Ogbaru'),(86,4,'Onitsha North'),(87,4,'Onitsha South'),(88,4,'Orumba North'),(89,4,'Orumba South'),(90,4,'Oyi'),(91,5,'Alkaleri'),(92,5,'Bauchi'),(93,5,'Bogoro'),(94,5,'Damban'),(95,5,'Darazo'),(96,5,'Dass'),(97,5,'Gamawa'),(98,5,'Ganjuwa'),(99,5,'Giade'),(100,5,'Itas/Gadau'),(101,5,'Jama\'are'),(102,5,'Katagum'),(103,5,'Kirfi'),(104,5,'Misau'),(105,5,'Ningi'),(106,5,'Shira'),(107,5,'Tafawa Balewa'),(108,5,'Toro'),(109,5,'Warji'),(110,5,'Zaki'),(111,6,'Brass'),(112,6,'Ekeremor'),(113,6,'Kolokuma/Opokuma'),(114,6,'Nembe'),(115,6,'Ogbia'),(116,6,'Sagbama'),(117,6,'Southern Ijaw'),(118,6,'Yenagoa'),(119,7,'Agatu'),(120,7,'Apa'),(121,7,'Ado'),(122,7,'Buruku'),(123,7,'Gboko'),(124,7,'Guma'),(125,7,'Gwer East'),(126,7,'Gwer West'),(127,7,'Katsina-Ala'),(128,7,'Konshisha'),(129,7,'Kwande'),(130,7,'Logo'),(131,7,'Makurdi'),(132,7,'Obi'),(133,7,'Ogbadibo'),(134,7,'Ohimini'),(135,7,'Oju'),(136,7,'Okpokwu'),(137,7,'Oturkpo'),(138,7,'Tarka'),(139,7,'Ukum'),(140,7,'Ushongo'),(141,7,'Vandeikya'),(142,8,'Abadam'),(143,8,'Askira/Uba'),(144,8,'Bama'),(145,8,'Bayo'),(146,8,'Biu'),(147,8,'Chibok'),(148,8,'Damboa'),(149,8,'Dikwa'),(150,8,'Gubio'),(151,8,'Guzamala'),(152,8,'Gwoza'),(153,8,'Hawul'),(154,8,'Jere'),(155,8,'Kaga'),(156,8,'Kala/Balge'),(157,8,'Konduga'),(158,8,'Kukawa'),(159,8,'Kwaya Kusar'),(160,8,'Mafa'),(161,8,'Magumeri'),(162,8,'Maiduguri'),(163,8,'Marte'),(164,8,'Mobbar'),(165,8,'Monguno'),(166,8,'Ngala'),(167,8,'Nganzai'),(168,8,'Shani'),(169,9,'Abi'),(170,9,'Akamkpa'),(171,9,'Akpabuyo'),(172,9,'Bakassi'),(173,9,'Bekwarra'),(174,9,'Biase'),(175,9,'Boki'),(176,9,'Calabar Municipal'),(177,9,'Calabar South'),(178,9,'Etung'),(179,9,'Ikom'),(180,9,'Obanliku'),(181,9,'Obubra'),(182,9,'Obudu'),(183,9,'Odukpani'),(184,9,'Ogoja'),(185,9,'Yakuur'),(186,9,'Yala'),(187,10,'Aniocha North'),(188,10,'Aniocha South'),(189,10,'Bomadi'),(190,10,'Burutu'),(191,10,'Ethiope East'),(192,10,'Ethiope West'),(193,10,'Ika North East'),(194,10,'Ika South'),(195,10,'Isoko North'),(196,10,'Isoko South'),(197,10,'Ndokwa East'),(198,10,'Ndokwa West'),(199,10,'Okpe'),(200,10,'Oshimili North'),(201,10,'Oshimili South'),(202,10,'Patani'),(203,10,'Sapele, Delta'),(204,10,'Udu'),(205,10,'Ughelli North'),(206,10,'Ughelli South'),(207,10,'Ukwuani'),(208,10,'Uvwie'),(209,10,'Warri North'),(210,10,'Warri South'),(211,10,'Warri South West'),(212,11,'Abakaliki'),(213,11,'Afikpo North'),(214,11,'Afikpo South'),(215,11,'Ebonyi'),(216,11,'Ezza North'),(217,11,'Ezza South'),(218,11,'Ikwo'),(219,11,'Ishielu'),(220,11,'Ivo'),(221,11,'Izzi'),(222,11,'Ohaozara'),(223,11,'Ohaukwu'),(224,11,'Onicha'),(225,12,'Akoko-Edo'),(226,12,'Egor'),(227,12,'Esan Central'),(228,12,'Esan North-East'),(229,12,'Esan South-East'),(230,12,'Esan West'),(231,12,'Etsako Central'),(232,12,'Etsako East'),(233,12,'Etsako West'),(234,12,'Igueben'),(235,12,'Ikpoba Okha'),(236,12,'Orhionmwon'),(237,12,'Oredo'),(238,12,'Ovia North-East'),(239,12,'Ovia South-West'),(240,12,'Owan East'),(241,12,'Owan West'),(242,12,'Uhunmwonde'),(243,13,'Ado Ekiti'),(244,13,'Efon'),(245,13,'Ekiti East'),(246,13,'Ekiti South-West'),(247,13,'Ekiti West'),(248,13,'Emure'),(249,13,'Gbonyin'),(250,13,'Ido Osi'),(251,13,'Ijero'),(252,13,'Ikere'),(253,13,'Ikole'),(254,13,'Ilejemeje'),(255,13,'Irepodun/Ifelodun'),(256,13,'Ise/Orun'),(257,13,'Moba'),(258,13,'Oye'),(259,14,'Aninri'),(260,14,'Awgu'),(261,14,'Enugu East'),(262,14,'Enugu North'),(263,14,'Enugu South'),(264,14,'Ezeagu'),(265,14,'Igbo Etiti'),(266,14,'Igbo Eze North'),(267,14,'Igbo Eze South'),(268,14,'Isi Uzo'),(269,14,'Nkanu East'),(270,14,'Nkanu West'),(271,14,'Nsukka'),(272,14,'Oji River'),(273,14,'Udenu'),(274,14,'Udi'),(275,14,'Uzo Uwani'),(276,15,'Abaji'),(277,15,'Bwari'),(278,15,'Gwagwalada'),(279,15,'Kuje'),(280,15,'Kwali'),(281,15,'Municipal Area Council'),(282,16,'Akko'),(283,16,'Balanga'),(284,16,'Billiri'),(285,16,'Dukku'),(286,16,'Funakaye'),(287,16,'Gombe'),(288,16,'Kaltungo'),(289,16,'Kwami'),(290,16,'Nafada'),(291,16,'Shongom'),(292,16,'Yamaltu/Deba'),(293,17,'Aboh Mbaise'),(294,17,'Ahiazu Mbaise'),(295,17,'Ehime Mbano'),(296,17,'Ezinihitte'),(297,17,'Ideato North'),(298,17,'Ideato South'),(299,17,'Ihitte/Uboma'),(300,17,'Ikeduru'),(301,17,'Isiala Mbano'),(302,17,'Isu'),(303,17,'Mbaitoli'),(304,17,'Ngor Okpala'),(305,17,'Njaba'),(306,17,'Nkwerre'),(307,17,'Nwangele'),(308,17,'Obowo'),(309,17,'Oguta'),(310,17,'Ohaji/Egbema'),(311,17,'Okigwe'),(312,17,'Orlu'),(313,17,'Orsu'),(314,17,'Oru East'),(315,17,'Oru West'),(316,17,'Owerri Municipal'),(317,17,'Owerri North'),(318,17,'Owerri West'),(319,17,'Unuimo'),(320,18,'Auyo'),(321,18,'Babura'),(322,18,'Biriniwa'),(323,18,'Birnin Kudu'),(324,18,'Buji'),(325,18,'Dutse'),(326,18,'Gagarawa'),(327,18,'Garki'),(328,18,'Gumel'),(329,18,'Guri'),(330,18,'Gwaram'),(331,18,'Gwiwa'),(332,18,'Hadejia'),(333,18,'Jahun'),(334,18,'Kafin Hausa'),(335,18,'Kazaure'),(336,18,'Kiri Kasama'),(337,18,'Kiyawa'),(338,18,'Kaugama'),(339,18,'Maigatari'),(340,18,'Malam Madori'),(341,18,'Miga'),(342,18,'Ringim'),(343,18,'Roni'),(344,18,'Sule Tankarkar'),(345,18,'Taura'),(346,18,'Yankwashi'),(347,19,'Birnin Gwari'),(348,19,'Chikun'),(349,19,'Giwa'),(350,19,'Igabi'),(351,19,'Ikara'),(352,19,'Jaba'),(353,19,'Jema\'a'),(354,19,'Kachia'),(355,19,'Kaduna North'),(356,19,'Kaduna South'),(357,19,'Kagarko'),(358,19,'Kajuru'),(359,19,'Kaura'),(360,19,'Kauru'),(361,19,'Kubau'),(362,19,'Kudan'),(363,19,'Lere'),(364,19,'Makarfi'),(365,19,'Sabon Gari'),(366,19,'Sanga'),(367,19,'Soba'),(368,19,'Zangon Kataf'),(369,19,'Zaria'),(370,20,'Ajingi'),(371,20,'Albasu'),(372,20,'Bagwai'),(373,20,'Bebeji'),(374,20,'Bichi'),(375,20,'Bunkure'),(376,20,'Dala'),(377,20,'Dambatta'),(378,20,'Dawakin Kudu'),(379,20,'Dawakin Tofa'),(380,20,'Doguwa'),(381,20,'Fagge'),(382,20,'Gabasawa'),(383,20,'Garko'),(384,20,'Garun Mallam'),(385,20,'Gaya'),(386,20,'Gezawa'),(387,20,'Gwale'),(388,20,'Gwarzo'),(389,20,'Kabo'),(390,20,'Kano Municipal'),(391,20,'Karaye'),(392,20,'Kibiya'),(393,20,'Kiru'),(394,20,'Kumbotso'),(395,20,'Kunchi'),(396,20,'Kura'),(397,20,'Madobi'),(398,20,'Makoda'),(399,20,'Minjibir'),(400,20,'Nasarawa'),(401,20,'Rano'),(402,20,'Rimin Gado'),(403,20,'Rogo'),(404,20,'Shanono'),(405,20,'Sumaila'),(406,20,'Takai'),(407,20,'Tarauni'),(408,20,'Tofa'),(409,20,'Tsanyawa'),(410,20,'Tudun Wada'),(411,20,'Ungogo'),(412,20,'Warawa'),(413,20,'Wudil'),(414,21,'Bakori'),(415,21,'Batagarawa'),(416,21,'Batsari'),(417,21,'Baure'),(418,21,'Bindawa'),(419,21,'Charanchi'),(420,21,'Dandume'),(421,21,'Danja'),(422,21,'Dan Musa'),(423,21,'Daura'),(424,21,'Dutsi'),(425,21,'Dutsin Ma'),(426,21,'Faskari'),(427,21,'Funtua'),(428,21,'Ingawa'),(429,21,'Jibia'),(430,21,'Kafur'),(431,21,'Kaita'),(432,21,'Kankara'),(433,21,'Kankia'),(434,21,'Katsina'),(435,21,'Kurfi'),(436,21,'Kusada'),(437,21,'Mai\'Adua'),(438,21,'Malumfashi'),(439,21,'Mani'),(440,21,'Mashi'),(441,21,'Matazu'),(442,21,'Musawa'),(443,21,'Rimi'),(444,21,'Sabuwa'),(445,21,'Safana'),(446,21,'Sandamu'),(447,21,'Zango'),(448,22,'Aleiro'),(449,22,'Arewa Dandi'),(450,22,'Argungu'),(451,22,'Augie'),(452,22,'Bagudo'),(453,22,'Birnin Kebbi'),(454,22,'Bunza'),(455,22,'Dandi'),(456,22,'Fakai'),(457,22,'Gwandu'),(458,22,'Jega'),(459,22,'Kalgo'),(460,22,'Koko/Besse'),(461,22,'Maiyama'),(462,22,'Ngaski'),(463,22,'Sakaba'),(464,22,'Shanga'),(465,22,'Suru'),(466,22,'Wasagu/Danko'),(467,22,'Yauri'),(468,22,'Zuru'),(469,23,'Adavi'),(470,23,'Ajaokuta'),(471,23,'Ankpa'),(472,23,'Bassa'),(473,23,'Dekina'),(474,23,'Ibaji'),(475,23,'Idah'),(476,23,'Igalamela Odolu'),(477,23,'Ijumu'),(478,23,'Kabba/Bunu'),(479,23,'Kogi'),(480,23,'Lokoja'),(481,23,'Mopa Muro'),(482,23,'Ofu'),(483,23,'Ogori/Magongo'),(484,23,'Okehi'),(485,23,'Okene'),(486,23,'Olamaboro'),(487,23,'Omala'),(488,23,'Yagba East'),(489,23,'Yagba West'),(490,24,'Asa'),(491,24,'Baruten'),(492,24,'Edu'),(493,24,'Ekiti, Kwara State'),(494,24,'Ifelodun'),(495,24,'Ilorin East'),(496,24,'Ilorin South'),(497,24,'Ilorin West'),(498,24,'Irepodun'),(499,24,'Isin'),(500,24,'Kaiama'),(501,24,'Moro'),(502,24,'Offa'),(503,24,'Oke Ero'),(504,24,'Oyun'),(505,24,'Pategi'),(506,25,'Agege'),(507,25,'Ajeromi-Ifelodun'),(508,25,'Alimosho'),(509,25,'Amuwo-Odofin'),(510,25,'Apapa'),(511,25,'Badagry'),(512,25,'Epe'),(513,25,'Eti Osa'),(514,25,'Ibeju-Lekki'),(515,25,'Ifako-Ijaiye'),(516,25,'Ikeja'),(517,25,'Ikorodu'),(518,25,'Kosofe'),(519,25,'Lagos Island'),(520,25,'Lagos Mainland'),(521,25,'Mushin'),(522,25,'Ojo'),(523,25,'Oshodi-Isolo'),(524,25,'Shomolu'),(525,25,'Surulere, Lagos State'),(526,26,'Akwanga'),(527,26,'Awe'),(528,26,'Doma'),(529,26,'Karu'),(530,26,'Keana'),(531,26,'Keffi'),(532,26,'Kokona'),(533,26,'Lafia'),(534,26,'Nasarawa'),(535,26,'Nasarawa Egon'),(536,26,'Obi'),(537,26,'Toto'),(538,26,'Wamba'),(539,27,'Agaie'),(540,27,'Agwara'),(541,27,'Bida'),(542,27,'Borgu'),(543,27,'Bosso'),(544,27,'Chanchaga'),(545,27,'Edati'),(546,27,'Gbako'),(547,27,'Gurara'),(548,27,'Katcha'),(549,27,'Kontagora'),(550,27,'Lapai'),(551,27,'Lavun'),(552,27,'Magama'),(553,27,'Mariga'),(554,27,'Mashegu'),(555,27,'Mokwa'),(556,27,'Moya'),(557,27,'Paikoro'),(558,27,'Rafi'),(559,27,'Rijau'),(560,27,'Shiroro'),(561,27,'Suleja'),(562,27,'Tafa'),(563,27,'Wushishi'),(564,28,'Abeokuta North'),(565,28,'Abeokuta South'),(566,28,'Ado-Odo/Ota'),(567,28,'Egbado North'),(568,28,'Egbado South'),(569,28,'Ewekoro'),(570,28,'Ifo'),(571,28,'Ijebu East'),(572,28,'Ijebu North'),(573,28,'Ijebu North East'),(574,28,'Ijebu Ode'),(575,28,'Ikenne'),(576,28,'Imeko Afon'),(577,28,'Ipokia'),(578,28,'Obafemi Owode'),(579,28,'Odeda'),(580,28,'Odogbolu'),(581,28,'Ogun Waterside'),(582,28,'Remo North'),(583,28,'Shagamu'),(584,29,'Akoko North-East'),(585,29,'Akoko North-West'),(586,29,'Akoko South-West'),(587,29,'Akoko South-East'),(588,29,'Akure North'),(589,29,'Akure South'),(590,29,'Ese Odo'),(591,29,'Idanre'),(592,29,'Ifedore'),(593,29,'Ilaje'),(594,29,'Ile Oluji/Okeigbo'),(595,29,'Irele'),(596,29,'Odigbo'),(597,29,'Okitipupa'),(598,29,'Ondo East'),(599,29,'Ondo West'),(600,29,'Ose'),(601,29,'Owo'),(602,30,'Atakunmosa East'),(603,30,'Atakunmosa West'),(604,30,'Aiyedaade'),(605,30,'Aiyedire'),(606,30,'Boluwaduro'),(607,30,'Boripe'),(608,30,'Ede North'),(609,30,'Ede South'),(610,30,'Ife Central'),(611,30,'Ife East'),(612,30,'Ife North'),(613,30,'Ife South'),(614,30,'Egbedore'),(615,30,'Ejigbo'),(616,30,'Ifedayo'),(617,30,'Ifelodun'),(618,30,'Ila'),(619,30,'Ilesa East'),(620,30,'Ilesa West'),(621,30,'Irepodun'),(622,30,'Irewole'),(623,30,'Isokan'),(624,30,'Iwo'),(625,30,'Obokun'),(626,30,'Odo Otin'),(627,30,'Ola Oluwa'),(628,30,'Olorunda'),(629,30,'Oriade'),(630,30,'Orolu'),(631,30,'Osogbo'),(632,31,'Afijio'),(633,31,'Akinyele'),(634,31,'Atiba'),(635,31,'Atisbo'),(636,31,'Egbeda'),(637,31,'Ibadan North'),(638,31,'Ibadan North-East'),(639,31,'Ibadan North-West'),(640,31,'Ibadan South-East'),(641,31,'Ibadan South-West'),(642,31,'Ibarapa Central'),(643,31,'Ibarapa East'),(644,31,'Ibarapa North'),(645,31,'Ido'),(646,31,'Irepo'),(647,31,'Iseyin'),(648,31,'Itesiwaju'),(649,31,'Iwajowa'),(650,31,'Kajola'),(651,31,'Lagelu'),(652,31,'Ogbomosho North'),(653,31,'Ogbomosho South'),(654,31,'Ogo Oluwa'),(655,31,'Olorunsogo'),(656,31,'Oluyole'),(657,31,'Ona Ara'),(658,31,'Orelope'),(659,31,'Ori Ire'),(660,31,'Oyo'),(661,31,'Oyo East'),(662,31,'Saki East'),(663,31,'Saki West'),(664,31,'Surulere, Oyo State'),(665,32,'Bokkos'),(666,32,'Barkin Ladi'),(667,32,'Bassa'),(668,32,'Jos East'),(669,32,'Jos North'),(670,32,'Jos South'),(671,32,'Kanam'),(672,32,'Kanke'),(673,32,'Langtang South'),(674,32,'Langtang North'),(675,32,'Mangu'),(676,32,'Mikang'),(677,32,'Pankshin'),(678,32,'Qua\'an Pan'),(679,32,'Riyom'),(680,32,'Shendam'),(681,32,'Wase'),(682,33,'Abua/Odual'),(683,33,'Ahoada East'),(684,33,'Ahoada West'),(685,33,'Akuku-Toru'),(686,33,'Andoni'),(687,33,'Asari-Toru'),(688,33,'Bonny'),(689,33,'Degema'),(690,33,'Eleme'),(691,33,'Emuoha'),(692,33,'Etche'),(693,33,'Gokana'),(694,33,'Ikwerre'),(695,33,'Khana'),(696,33,'Obio/Akpor'),(697,33,'Ogba/Egbema/Ndoni'),(698,33,'Ogu/Bolo'),(699,33,'Okrika'),(700,33,'Omuma'),(701,33,'Opobo/Nkoro'),(702,33,'Oyigbo'),(703,33,'Port Harcourt'),(704,33,'Tai'),(705,34,'Binji'),(706,34,'Bodinga'),(707,34,'Dange Shuni'),(708,34,'Gada'),(709,34,'Goronyo'),(710,34,'Gudu'),(711,34,'Gwadabawa'),(712,34,'Illela'),(713,34,'Isa'),(714,34,'Kebbe'),(715,34,'Kware'),(716,34,'Rabah'),(717,34,'Sabon Birni'),(718,34,'Shagari'),(719,34,'Silame'),(720,34,'Sokoto North'),(721,34,'Sokoto South'),(722,34,'Tambuwal'),(723,34,'Tangaza'),(724,34,'Tureta'),(725,34,'Wamako'),(726,34,'Wurno'),(727,34,'Yabo'),(728,35,'Ardo Kola'),(729,35,'Bali'),(730,35,'Donga'),(731,35,'Gashaka'),(732,35,'Gassol'),(733,35,'Ibi'),(734,35,'Jalingo'),(735,35,'Karim Lamido'),(736,35,'Kumi'),(737,35,'Lau'),(738,35,'Sardauna'),(739,35,'Takum'),(740,35,'Ussa'),(741,35,'Wukari'),(742,35,'Yorro'),(743,35,'Zing'),(744,36,'Bade'),(745,36,'Bursari'),(746,36,'Damaturu'),(747,36,'Fika'),(748,36,'Fune'),(749,36,'Geidam'),(750,36,'Gujba'),(751,36,'Gulani'),(752,36,'Jakusko'),(753,36,'Karasuwa'),(754,36,'Machina'),(755,36,'Nangere'),(756,36,'Nguru'),(757,36,'Potiskum'),(758,36,'Tarmuwa'),(759,36,'Yunusari'),(760,36,'Yusufari'),(761,37,'Anka'),(762,37,'Bakura'),(763,37,'Birnin Magaji/Kiyaw'),(764,37,'Bukkuyum'),(765,37,'Bungudu'),(766,37,'Gummi'),(767,37,'Gusau'),(768,37,'Kaura Namoda'),(769,37,'Maradun'),(770,37,'Maru'),(771,37,'Shinkafi'),(772,37,'Talata Mafara'),(773,37,'Chafe'),(774,37,'Zurmi');
/*!40000 ALTER TABLE `lga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `new_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  `uploaded_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potential_students`
--

DROP TABLE IF EXISTS `potential_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potential_students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `myname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `num_of_kids` varchar(45) DEFAULT NULL,
  `kids_info` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potential_students`
--

LOCK TABLES `potential_students` WRITE;
/*!40000 ALTER TABLE `potential_students` DISABLE KEYS */;
INSERT INTO `potential_students` VALUES (1,'jack','wilx6471@gmail.com','234567','2','Array'),(28,'jack','wilx6471@gmail.com','2345','2','{\"one\":\"kg1\",\"two\":\"kg2\"}'),(29,'jack','wilx6471@gmail.com','2345','2','{\"one\":\"kg1\",\"two\":\"kg2\"}'),(30,'jack','wilx6471@gmail.com','2345','2','{\"one\":\"kg1\",\"two\":\"kg2\"}'),(31,'jack','teacher@example.com','1234','2','{\"One\":\"kg1\",\"Two\":\"kg2\"}'),(32,'jack','teacher@example.com','1234','2','{\"One\":\"kg1\",\"Two\":\"kg2\"}'),(33,'jack','teacher@example.com','1234','2','{\"One\":\"kg1\",\"Two\":\"kg2\"}'),(34,'jack','teacher@example.com','1234','2','{\"One\":\"kg1\",\"Two\":\"kg2\"}'),(35,'jack','info@jadappstech.com','987654','3','{\"One\":\"1\",\"Two\":\"kg2\",\"Three\":\"kg3\"}'),(36,'jack','teacher@example.com','987654','2','{\"one\":\"one\",\"two\":\"2wo\"}'),(37,'jack','wilx6471@gmail.com','0976543','3','{\"One\":\"basic1\",\"Two\":\"basic2\",\"Three\":\"basic3\"}'),(38,'jack','ben@example.com','87654','3','{\"one\":\"kgone\",\"two\":\"kgtwo\",\"three\":\"kgthree\"}'),(39,'Ade','info@jadappstech.com','765787','2','{\"A\":\"one\",\"B\":\"twi\"}'),(40,'jack','ben@example.com','4567','2','{\"One\":\"1\",\"Two\":\"2\"}'),(41,'Julie','admin@example.com','23456','2','{\"One\":\"1\",\"Two\":\"2\"}'),(42,'jack','teacher@example.com','4567','2','{\"One\":\"1\",\"Two\":\"2\"}'),(43,'jack','wilx6471@gmail.com','87347','2','{\"One\":\"skdk\",\"Two\":\"skdk\"}'),(44,'Ade','teacher@example.com','576832','2','{\"One\":\"skdk\",\"Two\":\"skdk\"}'),(45,'Mike','teacher@example.com','34567','2','{\"1\":\"skdk\",\"2\":\"skdk\"}'),(46,'Mike','teacher@example.com','34567','2','{\"1\":\"skdk\",\"2\":\"skdk\"}'),(47,'jack','admin@example.com','23456','2','{\"one\":\"skdk\",\"two\":\"skdk\"}'),(48,'jack','admin@example.com','3456','2','{\"One\":\"skdk\",\"Two\":\"skdk\"}'),(49,'jack','admin@example.com','324567','2','{\"345\":\"skdk\",\"q32\":\"skdk\"}'),(50,'jack','info@jadappstech.com','234567','2','{\"ert\":\"skdk\",\"ads\":\"skdk\"}'),(51,'jack','teacher@example.com','45674','2','{\"djkdkj\":\"skdk\",\"djksh\":\"skdk\"}'),(52,'Joy','teacher@example.com','5637834','2','{\"Ade\":\"skdk\",\"Jade\":\"skdk\"}'),(53,'jack','admin@example.com','4567','2','{\"Ade\":\"skdk\",\"Ayo\":\"skdk\"}'),(54,'Ola Deji','o@gmail.com','','1','{\"Ade\":\"nursery2\"}'),(55,'','','','3','{\"1\":\"nusery1\",\"2\":\"nursery2\",\"3\":\"basic2\"}'),(56,'Obi Kelvin','obina@example.com','09012332112','2','{\"Kelvin Asamoa\":\"basic1\",\"Kelvin Ada\":\"basic3\"}'),(57,'God\'swill Odjesawha','wilx6471@gmail.com','09058440276','2','{\"Jaxon\":\"basic3\",\"Jolly\":\"basic2\"}'),(58,'dyzuxe','kigo@mailinator.com','259','3','{\"Henry\":\"elementary\",\"Hillary\":\"junior\",\"Helen\":\"high\"}'),(59,'Obi','Ade2@ddp.com','123456823','2','{\"Phil\":\"basic1\",\"Lucy\":\"jss2\"}');
/*!40000 ALTER TABLE `potential_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_fees_details`
--

DROP TABLE IF EXISTS `school_fees_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_fees_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) DEFAULT NULL,
  `acct_name` varchar(45) DEFAULT NULL,
  `bank_name` varchar(45) DEFAULT NULL,
  `acct_num` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_fees_details`
--

LOCK TABLES `school_fees_details` WRITE;
/*!40000 ALTER TABLE `school_fees_details` DISABLE KEYS */;
INSERT INTO `school_fees_details` VALUES (1,'jss1','Name of sch','FBN','1234123455',NULL),(2,'jss2','account number','bank name','1234567890','5000'),(3,'jss3','School name','First bank','1234567888','20000'),(4,'sss1','account name','bank name','1234567890',NULL),(5,'sss2','ss2 acct name','ss2 bank name','2234567890',NULL),(6,'sss3','account number','bank name','1234567890',NULL),(7,'universal',NULL,NULL,NULL,NULL),(8,'nursery2','account number','bank name','1234567890','5000'),(9,'prenursery','account number','bank name','1234567890','5000');
/*!40000 ALTER TABLE `school_fees_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_fees_items`
--

DROP TABLE IF EXISTS `school_fees_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_fees_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `schoolfeesitem` varchar(45) DEFAULT NULL,
  `description` varchar(450) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `modality` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_fees_items`
--

LOCK TABLES `school_fees_items` WRITE;
/*!40000 ALTER TABLE `school_fees_items` DISABLE KEYS */;
INSERT INTO `school_fees_items` VALUES (1,'party','A party for every student at the end of the term','4000','optional','4'),(2,'party2','A party for every student at the end of the term','1000','optional','4'),(3,'party','A party for every student at the end of the term','1000','optional','4'),(4,'school fees','School fees for the term','1000','compulsory','4'),(5,'school fees','School fees ','1000','optional','4'),(6,'school fees','School fees','1000','optional','4'),(7,'school fees','School fees','1000','optional','4'),(8,'shcool','fees','1000','optional','4'),(9,'fees','school','1000','optional','4'),(10,'as','asd','1000','compulsory','4'),(11,'asd','asa','1000','compulsory','4'),(12,'graduation gown','Gown for graduating students','1000','compulsory','4'),(13,'sports wear','Sports wear for new students','1000','compulsory','4'),(14,'text books','Books for students','1000','compulsory','4'),(19,'school bus','Bus fee','1000','optional','4'),(20,'school bus','Bus fee','1500','optional','4'),(21,'school bus','Bus fee','','compulsory','4'),(22,'school bus','Bus fee','','compulsory','4'),(23,'school bus','Bus fee','5000','optional','4'),(25,'loveth fee','A fee to give to Loveth at the end of the term','3000','compulsory','4');
/*!40000 ALTER TABLE `school_fees_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_fees_receipts`
--

DROP TABLE IF EXISTS `school_fees_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_fees_receipts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `receipt` varchar(2048) DEFAULT NULL,
  `submitted_by` varchar(4) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_fees_receipts`
--

LOCK TABLES `school_fees_receipts` WRITE;
/*!40000 ALTER TABLE `school_fees_receipts` DISABLE KEYS */;
INSERT INTO `school_fees_receipts` VALUES (1,'hope.jpg','2',1);
/*!40000 ALTER TABLE `school_fees_receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schoolfees`
--

DROP TABLE IF EXISTS `schoolfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schoolfees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student` varchar(4) DEFAULT NULL,
  `schoolfees` varchar(8) DEFAULT NULL,
  `school_fees_items` varchar(126) DEFAULT NULL,
  `discount` varchar(8) DEFAULT NULL,
  `total` varchar(8) DEFAULT NULL,
  `student_class` varchar(16) DEFAULT NULL,
  `term` varchar(8) DEFAULT NULL,
  `uploaded_by` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolfees`
--

LOCK TABLES `schoolfees` WRITE;
/*!40000 ALTER TABLE `schoolfees` DISABLE KEYS */;
INSERT INTO `schoolfees` VALUES (1,'15','12000','[\"1\",\"8\",\"19\"]','100','17900',NULL,NULL,'4'),(2,'15','12000','[\"1\",\"8\",\"19\"]','100','17900',NULL,NULL,'4'),(3,'12','15000','[\"1\",\"2\",\"3\"]','100','20900',NULL,NULL,'4'),(4,'11','12000','[\"1\",\"4\",\"5\",\"8\"]','500','18500',NULL,NULL,'4');
/*!40000 ALTER TABLE `schoolfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) DEFAULT NULL,
  `term` varchar(45) DEFAULT NULL,
  `first_test` varchar(3062) DEFAULT NULL,
  `second_test` varchar(3062) DEFAULT NULL,
  `exam` varchar(3062) DEFAULT NULL,
  `total_score` varchar(3062) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `average` varchar(45) DEFAULT NULL,
  `students_class` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,'11','first','{\"social studies\":\"13\",\"creative art\":\"14\",\"bible talk\":\"14\",\"mathematics\":\"14\",\"phonetics\":\"14\",\"physics\":\"14\",\"health education\":\"13\",\"verbal reasoning\":\"18\",\"civic education\":\"14\"}','{\"bible talk\":\"14\",\"creative art\":\"20\",\"phonetics\":\"14\",\"social studies\":\"14\",\"mathematics\":\"13\",\"civic education\":\"16\"}','{\"phonetics\":\"52\",\"mathematics\":\"70\",\"civic education\":\"52\"}','{\"physics\":\"13\",\"verbal reasoning\":18,\"social studies\":27,\"mathematics\":97,\"phonetics\":80,\"civic education\":82}','317','52.833333333333',NULL),(6,'27','first','{\"social studies\":\"13\",\"creative art\":\"14\",\"bible talk\":\"14\",\"mathematics\":\"19\",\"phonetics\":\"14\",\"physics\":\"15\",\"health education\":\"13\"}','{\"social studies\":\"13\"}','{\"nature talk\":\"12\"}','{\"nature talk\":12}','12','12',NULL),(7,'22','first','{\"social studies\":\"13\",\"bible talk\":\"14\",\"handwriting\":\"14\",\"creative art\":\"12\",\"phonetics\":\"20\"}','{\"social studies\":\"12\",\"bible talk\":\"14\",\"handwriting\":\"13\",\"creative art\":\"17\",\"phonetics\":\"20\"}','{\"bible talk\":\"52\",\"handwriting\":\"52\",\"creative art\":\"76\",\"phonetics\":\"59\"}','{\"handwriting\":79,\"creative art\":105,\"phonetics\":99}','283','94.333333333333',NULL),(8,'2','second','{\"nature talk\":\"14\"}','{\"social studies\":\"13\",\"creative art\":\"14\",\"bible talk\":\"14\",\"mathematics\":\"14\",\"phonetics\":\"14\",\"physics\":\"14\",\"health education\":\"13\"}',NULL,NULL,NULL,NULL,NULL),(9,'12','first','{\"physics\":\"13\",\"mathematics\":\"14\"}','{\"mathematics\":\"12\"}',NULL,NULL,NULL,NULL,NULL),(10,'12','second','{\"mathematics\":\"13\",\"biology\":\"13\"}',NULL,NULL,NULL,NULL,NULL,NULL),(11,'2','third','{\"bible talk\":\"18\",\"creative art\":\"18\"}','{\"bible talk\":\"14\",\"nature talk\":\"14\"}','{\"bible talk\":\"52\",\"nature talk\":\"14\"}',NULL,NULL,NULL,NULL),(12,'5','first',NULL,'{\"\":\"23\"}',NULL,'{\"\":23}','23','23',NULL);
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Abia'),(2,'Adamawa'),(3,'Akwa Ibom'),(4,'Anambra'),(5,'Bauchi'),(6,'Bayelsa'),(7,'Benue'),(8,'Borno'),(9,'Cross River'),(10,'Delta'),(11,'Ebonyi'),(12,'Edo'),(13,'Ekiti'),(14,'Enugu'),(15,'FCT'),(16,'Gombe'),(17,'Imo'),(18,'Jigawa'),(19,'Kaduna'),(20,'Kano'),(21,'Katsina'),(22,'Kebbi'),(23,'Kogi'),(24,'Kwara'),(25,'Lagos'),(26,'Nasarawa'),(27,'Niger'),(28,'Ogun'),(29,'Ondo'),(30,'Osun'),(31,'Oyo'),(32,'Plateau'),(33,'Rivers'),(34,'Sokoto'),(35,'Taraba'),(36,'Yobe'),(37,'Zamfara');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_classes`
--

DROP TABLE IF EXISTS `student_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) DEFAULT NULL,
  `uploaded_by` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_classes`
--

LOCK TABLES `student_classes` WRITE;
/*!40000 ALTER TABLE `student_classes` DISABLE KEYS */;
INSERT INTO `student_classes` VALUES (1,'prenursery','3','elementary'),(2,'nursery1','3','elementary'),(3,'nursery2','3','elementary'),(4,'basic1','3','elementary'),(5,'basic2','3','elementary'),(6,'basic 3','3','elementary'),(7,'basic4','3','elementary'),(8,'basic5','3','elementary'),(9,'basic6','3','elementary'),(10,'jss1','3','junior'),(11,'jss2','3','junior'),(12,'jss3','3','junior'),(13,'sss1','3','high'),(14,'sss2','3','high'),(15,'sss3','3','high');
/*!40000 ALTER TABLE `student_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_positions`
--

DROP TABLE IF EXISTS `student_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student` varchar(45) DEFAULT NULL,
  `class` varchar(16) DEFAULT NULL,
  `term` varchar(8) DEFAULT NULL,
  `position` varchar(4) DEFAULT NULL,
  `session` varchar(16) DEFAULT NULL,
  `compiled_by` varchar(2) DEFAULT NULL,
  `updated` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_positions`
--

LOCK TABLES `student_positions` WRITE;
/*!40000 ALTER TABLE `student_positions` DISABLE KEYS */;
INSERT INTO `student_positions` VALUES (1,'11',NULL,'first','2','2023/2024','7','2024-7-29 20:34:15'),(2,'22',NULL,'first','1','2023/2024','7','2024-7-29 20:34:15'),(3,'27',NULL,'first','3','2023/2024','7','2024-7-29 20:34:15'),(4,'11',NULL,'first','235','2023/2024','7','2024-7-29 14:29:16'),(5,'22',NULL,'first','283','2023/2024','7','2024-7-29 14:29:16'),(6,'27',NULL,'first','12','2023/2024','7','2024-7-29 14:29:16'),(7,'11',NULL,'first','235','2023/2024','7','2024-7-29 14:32:31'),(8,'22',NULL,'first','283','2023/2024','7','2024-7-29 14:32:31'),(9,'27',NULL,'first','12','2023/2024','7','2024-7-29 14:32:31'),(10,'11',NULL,'first','235','2023/2024','7','2024-7-29 19:42:21'),(11,'22',NULL,'first','283','2023/2024','7','2024-7-29 19:42:21'),(12,'27',NULL,'first','12','2023/2024','7','2024-7-29 19:42:21'),(13,'15',NULL,'first','1','2023/2024','5','2024-7-30 11:15:2'),(14,'21',NULL,'first','2','2023/2024','5','2024-7-30 11:15:2');
/*!40000 ALTER TABLE `student_positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `uploaded_by` varchar(45) DEFAULT NULL,
  `assigned_class` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'mathematics','high','1',NULL),(2,'english language','high','2',NULL),(3,'physics','high','3',NULL),(4,'chemistry','high','3',NULL),(5,'economics','high','3',NULL),(6,'mathematics','elementary','3',NULL),(7,'quantitative reasoning','elementary','3',NULL),(8,'Dictation and spelling','elementary','3',NULL),(9,'civic education','elementary','3',NULL),(11,'handwriting','elementary','3',NULL),(13,'social studies','elementary','3',NULL),(14,'nature talk','elementary','3',NULL),(15,'creative art','elementary','3',NULL),(16,'bible talk','elementary','3',NULL),(17,'phonetics','elementary','3',NULL),(18,'physics','elementary','3',NULL),(19,'biology','high','3',NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toteach`
--

DROP TABLE IF EXISTS `toteach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `toteach` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toteach`
--

LOCK TABLES `toteach` WRITE;
/*!40000 ALTER TABLE `toteach` DISABLE KEYS */;
INSERT INTO `toteach` VALUES (1,'elementary'),(2,'junior'),(3,'high'),(4,'junior and high');
/*!40000 ALTER TABLE `toteach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_assignments`
--

DROP TABLE IF EXISTS `upload_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload_assignments` (
  `id` int NOT NULL,
  `assignment` int DEFAULT NULL,
  `student` int DEFAULT NULL,
  `assignment_file` varchar(256) DEFAULT NULL,
  `students_class` varchar(45) DEFAULT NULL,
  `teacher` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_assignments`
--

LOCK TABLES `upload_assignments` WRITE;
/*!40000 ALTER TABLE `upload_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(125) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `usertype` varchar(45) NOT NULL DEFAULT 'student',
  `regnum` varchar(45) DEFAULT NULL,
  `students_class` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `lga` varchar(45) DEFAULT NULL,
  `bloodgroup` varchar(45) DEFAULT NULL,
  `genotype` varchar(45) DEFAULT NULL,
  `parents_fullname` varchar(100) DEFAULT NULL,
  `parents_phone` varchar(45) DEFAULT NULL,
  `parents_number` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `wphone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `sponsor_fullname` varchar(45) DEFAULT NULL,
  `sponsor_phone` varchar(45) DEFAULT NULL,
  `sponsor_email` varchar(45) DEFAULT NULL,
  `sponsor_occupation` varchar(45) DEFAULT NULL,
  `sponsor_wphone` varchar(45) DEFAULT NULL,
  `sponsor_address` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `parents_email` varchar(125) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `school_fees` int NOT NULL DEFAULT '0',
  `photo` varchar(256) DEFAULT NULL,
  `toteach` varchar(2048) DEFAULT NULL,
  `prev_school` varchar(45) DEFAULT NULL,
  `office_address` varchar(45) DEFAULT NULL,
  `office_phone` varchar(45) DEFAULT NULL,
  `sponsor_office_phone` varchar(45) DEFAULT NULL,
  `sponsor_office_address` varchar(45) DEFAULT NULL,
  `form_teacher` int DEFAULT '0',
  `form_class` varchar(45) DEFAULT NULL,
  `active` varchar(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Apiuser',NULL,'user@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','admin','1122','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'0'),(2,'student','akali','newuser@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student','','basic5','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams Alihu','910234567',NULL,'Software Developer','910234567','Home','Adams Alihu','910234567','Test@example.com','Software Developer','910234567','Home','','Test@example.com','female',0,'111.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(3,'admin','aliyu','admin@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','admin','1111',NULL,'Nigerian','Federal Capital Territory','AMAC','O-','AA','Adams Alihu','910234567',NULL,'Software Developer','910234567','Home','Adams Alihu','910234567','Test@example.com','Software Developer','910234567','Home','','Test@example.com','male',0,'birset1r_.jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(4,'jack','aliyu','jack@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','accountant','1000','basic4','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams Alihu','910234567',NULL,'Software Developer','910234567','Home','Adams Alihu','910234567','Test@example.com','Software Developer','910234567','Home','','Test@example.com','male',1,'',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(5,'jones','ryanno','jones@example.com','$2y$10$c73KB1a6nYHXSvAsJQB7qOAj85SeSCHgJyO.F8s0DlxQ3MfrPMSVG','teacher','1234','','Nigerian','Federal Capital Territory','AMAC','','AA','','09112345678',NULL,'','','R/ship','Emergency Full name','127349324','email@example.com','Occupation','','Office address','2018-02-14','Test@example.com','male',0,'....jpg','{\"prenursery\":[\"mathematics\"],\"basic5\":[\"mathematics\"],\"sss3\":[\"mathematics\",\"physics\"]}',NULL,NULL,NULL,NULL,NULL,1,'jss1','1'),(7,'edith','olodo','teacher@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','teacher','3456','','','Federal Capital Territory','AMAC','','','','',NULL,'','','UEONO','','','','','','','1800-08-26','','female',0,NULL,'{\"prenursery\":[\"physics\"]}',NULL,NULL,NULL,NULL,NULL,1,'prenursery','1'),(8,'tunde','agbawe','tunde@example.com','$2y$10$M9Lod3b..85WH9cMNMW/FOsB4rURW0u4CWusEBaf4cM.8dMWNwnkO','student','RN415','basic4','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','female',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(9,'marcus',NULL,'marcus@example.com','$2y$10$0HTR6JX2L6OSrigJl1eIm.tRvj0/jWOAE5WMY97qksk9/3AB.Wnbm','admin','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(10,'adams','Bitrus','adams@example.com','$2y$10$7TJFr0OR4d7ZcNVAskRdZOgmJfOk9uBoPMrmVsAB6GlEP18PZoCNa','student','RG4119','SSS1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(11,'uche','Pedro','uche@example.com','$2y$10$zkzKYkJp0yG1xHalanjLguLCp4C6n79ibWzQsZ0smEHuu/.bPICc6','student','RG4117','prenursery',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(12,'ken','Neth','ken@example.com','$2y$10$V8Zjxa2QE7pG9DMhAUupIeLxDeJ6/M9UzqT42KluEemcPZxBD1B/y','student','RG4114','SSS3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(13,'james','Docker','james@example.com','$2y$10$yL7eNCSyuj7C1sGxy28yIOe6LUVfHgArBSTKuhFmQWRKrs4gpUrnW','teacher','null',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'{\"prenursery\":[\"mathematics\",\"quantitative_reasoning\",\"chem\",\"handwriting\",\"social_studies\",\"nature_talk\",\"bible_talk\"],\"basic1\":[\"quantitative_reasoning\",\"chem\",\"handwriting\",\"health_education\",\"nature_talk\",\"bible_talk\"],\"basic2\":[\"quantitative_reasoning\",\"verbal_reasoning\",\"health_education\",\"social_studies\",\"nature_talk\",\"bible_talk\"],\"basic4\":[\"mathematics\",\"chem\",\"handwriting\",\"health_education\",\"nature_talk\",\"bible_talk\"],\"basic5\":[\"quantitative_reasoning\",\"verbal_reasoning\",\"health_education\",\"social_studies\",\"creative_art\"]}',NULL,NULL,NULL,NULL,NULL,1,'nursery1','1'),(14,'ben',NULL,'ben@example.com','$2y$10$k004IKak0t0n9B0uq314VOxmdk2TDj2rfg5mEKyw3l8nUqgLLvoe6','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(15,'edfg','rewrdfvhjkjnf','tryjack@example.com','$2y$10$8yeN3fhuZ/oldbTsZ8atTOHAvuEcfj25L/vkBme3nQt9976stCiva','student','rg001','JSS1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'....jpg',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(16,'Felix','',NULL,'$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student','','jss2','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(17,'fidelis','nkem',NULL,'$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student','RG4186','nursery2','Nigerian','Federal Capital Territory','AMAC','O+','AA','Father\'s name','091233456564',NULL,'Staff','091233456564','res. Address','Mother\'s name','091233456564','test@example.com','Staff','091233456564','residential Address','2018-02-14','father@dmail.cim','male',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(18,'Fidelis','Eli',NULL,'$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student',NULL,'SSS1','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(19,'Fidelis','Eli',NULL,NULL,'student',NULL,'SSS2','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(20,'Fidelis','Eli',NULL,NULL,'student',NULL,'SSS3','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(21,'Fidelia','',NULL,NULL,'student',NULL,'JSS1','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','female',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(22,'fidellia','',NULL,'$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student','2345','prenursery','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','female',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(23,'ramos','',NULL,NULL,'student',NULL,'sss1','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','male',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(24,'Obioma','',NULL,NULL,'student',NULL,'jss2','','Federal Capital Territory','AMAC','','','','',NULL,'','','','','','','','','','','','',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(25,'ngozi','pedro',NULL,'$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','student','RG4111','jss2','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams Pedro','12345678912',NULL,'Software Developer','12345678912','Home','Adams Pedro','12345678912','Test@example.com','Software Developer','12345678912','Home','','Test@example.com','female',1,'',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(26,'fidelis','alihu',NULL,NULL,'student',NULL,'jss2','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams','09012345678',NULL,'Software Developer','09012345678','Home','Aliya Aliyu','09012345678','test@example.com','Software Developer','09012345678','Home','2007-01-30','test@example.com','Array[\'gender\']',0,NULL,NULL,'SIA','Office','09012345678','09012345678','Office',0,NULL,'1'),(27,'fidelis','Abidemi',NULL,NULL,'student',NULL,'prenursery','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams','09012345678',NULL,'Software Developer','09012345678','Home','Aliya Aliyu','09012345678','test@example.com','Software Developer','09012345678','Home','2007-01-30','test@example.com','Array[\'gender\']',0,NULL,NULL,'SIA','Office','09012345678','09012345678','Office',0,NULL,'1'),(28,'fidelis','alihu',NULL,NULL,'student',NULL,'jss3','Nigerian','Federal Capital Territory','AMAC','O+','AA','Adams','09012345678',NULL,'Software Developer','09012345678','Home','Aliya Aliyu','09012345678','test@example.com','Software Developer','09012345678','Home','2007-01-30','test@example.com','Array[\'gender\']',0,NULL,NULL,'SIA','Office','09012345678','09012345678','Office',0,NULL,'1'),(29,'new','Teacher','new@example.com','$2y$10$0kChpnPR2i1gQrE7cEh1V.bYruj6vg8N3dfTDc13H40pK9ecA0NF.','teacher','RG411',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'basic2','1'),(30,'adelaja','Oruno','adelaja@example.com','$2y$10$uLMUa5YriQO618sHv3ngxe3otJqaZrIHNX7/d7d/cBMQrkQ9vnudi','teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'{\"prenursery\":[\"mathematics\",\"quantitative_reasoning\",\"chem\"]}',NULL,NULL,NULL,NULL,NULL,1,'basic1','1'),(31,'abi','oye','abi@example.com','$2y$10$69BL1TNnVvHvBnkB1JOkeew9kjoMIkqL3cXPoaYnK5NHgQG4pzSXO','teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'jss2','1'),(32,'kenny','Adamy','kenny@example.com','$2y$10$IxuFGqGQ4bJ45DEYlyNZSe8Qoc7kFIjHo0h0FCNib6n3pnmZHtrU2','student','GR4111','nursery1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'contractors.png',NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(33,'aboki','malam','aboki@example.com','$2y$10$xLrsiur1.DLOgQqfSeCDX.588tkOFx.ymPV//TcVqIFEDwibzMulW','student','q123','nursery2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1'),(34,'malam','olodo','malam@olodo.com','$2y$10$FORVWnMxnH0OeZy3WPS8EuBo5H/gv.zNTYu7ksVwfwm/tmpGKIGfi','teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'basic 3','1'),(35,'teacher','washington','washington@example.com','$2y$10$DgthWhNFvYQCVpSJC0gbbe4UIAr2yl7Yl1xXkYaLwlkfq.TDt36e2','teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,'1');
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

-- Dump completed on 2024-09-26 11:43:16
