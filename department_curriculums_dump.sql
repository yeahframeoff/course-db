CREATE DATABASE  IF NOT EXISTS `department_curriculum` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `department_curriculum`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: department_curriculum
-- ------------------------------------------------------
-- Server version	5.5.38-log

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
-- Table structure for table `curriculums`
--

DROP TABLE IF EXISTS `curriculums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `type` varchar(16) NOT NULL,
  `hours` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curriculum_subjects1_idx` (`subject_id`),
  CONSTRAINT `fk_curriculum_subjects1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculums`
--

LOCK TABLES `curriculums` WRITE;
/*!40000 ALTER TABLE `curriculums` DISABLE KEYS */;
INSERT INTO `curriculums` (`id`, `subject_id`, `type`, `hours`) VALUES (1,1,'LEC',45),(2,1,'PRA',45),(3,1,'LAB',45),(4,3,'LEC',180),(5,3,'PRA',90),(6,4,'LEC',145),(7,4,'PRA',45),(8,5,'LEC',145),(9,5,'PRA',90);
/*!40000 ALTER TABLE `curriculums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` (`id`, `position`) VALUES (1,'Профессор'),(2,'Доцент'),(3,'Ассистент'),(4,'Старший преподаватель');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `title`) VALUES (1,'Организация Баз Данных и Знаний'),(2,'Объектно-Ориентированное Программироние'),(3,'Математические Методы Исследования операций'),(4,'Теория Алгоритмов'),(5,'Дискретная Математика');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `name2` varchar(16) NOT NULL,
  `surname` varchar(16) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `gender` varchar(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `department` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teachers_positions_idx` (`position_id`),
  CONSTRAINT `fk_teachers_positions` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `name`, `name2`, `surname`, `date_of_birth`, `gender`, `position_id`, `department`) VALUES (1,'Владимир','Дмитриевич','Попенко','1970-06-15 00:00:00','М',2,'АСОИУ'),(2,'Жданова','Елена','Григорьевна','1970-08-25 00:00:00','Ж',2,'АСОИУ'),(3,'Молчановский','Алексей','Игоревич','1980-04-10 00:00:00','М',4,'АСОИУ'),(4,'Василий','Петрович','Блощичкий','1960-06-12 00:00:00','М',3,'АСУ');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_curriculums`
--

DROP TABLE IF EXISTS `teachers_curriculums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers_curriculums` (
  `teacher_id` int(11) NOT NULL,
  `curriculum_id` int(11) NOT NULL,
  `hours` mediumint(9) NOT NULL,
  PRIMARY KEY (`teacher_id`,`curriculum_id`),
  KEY `fk_teachers_has_curriculum_curriculum1_idx` (`curriculum_id`),
  KEY `fk_teachers_has_curriculum_teachers1_idx` (`teacher_id`),
  CONSTRAINT `fk_teachers_has_curriculum_curriculum1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teachers_has_curriculum_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_curriculums`
--

LOCK TABLES `teachers_curriculums` WRITE;
/*!40000 ALTER TABLE `teachers_curriculums` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers_curriculums` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-13 15:51:45
