# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.49-3)
# Database: _docaid
# Generation Time: 2011-11-30 13:11:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bed
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bed`;

CREATE TABLE `bed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mac` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bed_room1` (`room_id`),
  CONSTRAINT `fk_bed_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `bed` WRITE;
/*!40000 ALTER TABLE `bed` DISABLE KEYS */;

INSERT INTO `bed` (`id`, `room_id`, `name`, `mac`)
VALUES
	(1,1,'Bed A','F0:CB:A1:5C:94:0A'),
	(2,1,'Bed B','E0:F8:47:5F:63:02'),
	(3,3,'Bed A','00:50:56:5F:89:17'),
	(4,1,'Bed C','00:0C:29:8D:74:42'),
	(5,2,'Bed A','00:05:69:6C:C5:89'),
	(6,2,'Bed B','00:1C:14:35:79:EF'),
	(7,3,'Bed A','00:05:69:2B:BE:53'),
	(8,3,'Bed B','00:0C:29:26:30:04'),
	(9,3,'Bed C','00:50:56:BA:CA:48'),
	(10,7,'Bed D','00:50:56:9C:63:D4'),
	(11,4,'Bed X','00:50:56:F4:B8:F8');

/*!40000 ALTER TABLE `bed` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table chart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chart`;

CREATE TABLE `chart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `admitted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_chart_patient1` (`patient_id`),
  CONSTRAINT `fk_chart_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `chart` WRITE;
/*!40000 ALTER TABLE `chart` DISABLE KEYS */;

INSERT INTO `chart` (`id`, `patient_id`, `admitted`)
VALUES
	(1,1,'2011-11-02 00:00:00'),
	(2,8,'2011-11-17 10:00:00'),
	(3,3,'2011-11-01 00:00:00'),
	(4,2,'2011-08-08 00:00:00'),
	(5,4,'2011-11-11 00:00:00'),
	(6,5,'2011-02-06 00:00:00'),
	(7,7,'0000-00-00 00:00:00'),
	(8,6,'2011-12-31 00:00:00');

/*!40000 ALTER TABLE `chart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hospital
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hospital`;

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;

INSERT INTO `hospital` (`id`, `name`)
VALUES
	(1,'St John\'s Hospital');

/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table note
# ------------------------------------------------------------

DROP TABLE IF EXISTS `note`;

CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `text` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_note_chart1` (`chart_id`),
  KEY `fk_note_staff1` (`staff_id`),
  CONSTRAINT `fk_note_chart1` FOREIGN KEY (`chart_id`) REFERENCES `chart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_note_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;

INSERT INTO `note` (`id`, `chart_id`, `staff_id`, `created`, `updated`, `text`)
VALUES
	(1,1,1,'2011-11-01 00:00:00','0000-00-00 00:00:00','Patient was absent from bed and could not be examined\r\n\r\nD.O\'Connor'),
	(2,1,2,'2011-11-09 00:00:00','0000-00-00 00:00:00','Patient required drip insertion, Scheduled for surgery Tuesday'),
	(3,2,4,'2011-11-27 19:34:51','0000-00-00 00:00:00','Patient needs to be quarantined, highly infectious. Needs hourly Checks, V.Grace'),
	(4,2,4,'2011-11-28 19:37:07','0000-00-00 00:00:00','Patient seems to be recovering unusually quickly. Reduced dosages in line with recovery.'),
	(5,2,4,'2011-11-29 19:39:43','0000-00-00 00:00:00','Patient seems fully recovered, but I\'ve advised him to stay for continued monitoring.'),
	(6,3,2,'2011-11-01 00:00:00','0000-00-00 00:00:00','Patient scheduled for absyss removal. Wound treatment until surgery. J.Regan'),
	(7,3,3,'2011-11-02 14:12:00','0000-00-00 00:00:00','Patient scheduled for hospital transfer. Bed free on Thursday. J.Kilfeather'),
	(8,3,2,'2011-11-05 15:45:00','0000-00-00 00:00:00','Patient given increased dosage of anti-biotics. Course 1wk. Scheduled for leave wednesday'),
	(9,3,3,'2011-11-14 08:00:00','0000-00-00 00:00:00','Patient\'s heart rate above normal, sent for ECG.'),
	(26,1,2,'2011-11-30 00:12:03','0000-00-00 00:00:00','I evaluated the conditions and deemed Mr. Kent to have no illness at all . Immediate discharge and possible report to authorities');

/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table patient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `bed_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patient_bed1` (`bed_id`),
  CONSTRAINT `fk_patient_bed1` FOREIGN KEY (`bed_id`) REFERENCES `bed` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Patient Information Table.';

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;

INSERT INTO `patient` (`id`, `name`, `dob`, `sex`, `bed_id`)
VALUES
	(1,'John Regan','1987-11-22','Male',1),
	(2,'Denis O\'Connor','1987-08-26','Male',2),
	(3,'Vincent Grace','1989-02-28','Male',3),
	(4,'Derek Organ','1979-05-17','Male',4),
	(5,'Mary Fairy','2001-01-18','Female',5),
	(6,'Jane Doe','2002-02-14','Male',6),
	(7,'St. Patrick','1800-03-14','Male',7),
	(8,'Clarke Kent','1961-01-01','Male',11);

/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table patient_staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `patient_staff`;

CREATE TABLE `patient_staff` (
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`patient_id`,`staff_id`),
  KEY `fk_patient_has_staff_staff1` (`staff_id`),
  KEY `fk_patient_has_staff_patient` (`patient_id`),
  CONSTRAINT `fk_patient_has_staff_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_patient_has_staff_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table stores the favorites for the staff member. ';



# Dump of table room
# ------------------------------------------------------------

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ward_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mac` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_room_ward1` (`ward_id`),
  CONSTRAINT `fk_room_ward1` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;

INSERT INTO `room` (`id`, `ward_id`, `name`, `mac`)
VALUES
	(1,1,'Room 101','00:05:69:86:5A:FB'),
	(2,1,'Room 201','E0:F8:47:5F:63:02'),
	(3,1,'Room 203','00:1C:14:64:B6:30'),
	(4,3,'Room 202','11:22:33:44:55:AA'),
	(5,2,'Room 5001','11:00:11:00:11:00'),
	(6,4,'Room 303','00:0C:29:50:1B:C7'),
	(7,6,'Room 101A','00:50:56:80:AB:02'),
	(8,7,'Room 2B','00:0C:29:84:58:7F'),
	(9,7,'Room 3B','00:0C:29:1E:19:94'),
	(10,8,'Room 3C','00:0C:29:30:1D:45'),
	(11,10,'Room 6D','00:05:69:E6:A9:E3'),
	(12,1,'Room 505','00:1C:14:CE:11:61');

/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('Doctor','Nurse') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_staff_hospital1` (`hospital_id`),
  CONSTRAINT `fk_staff_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;

INSERT INTO `staff` (`id`, `hospital_id`, `name`, `type`)
VALUES
	(1,1,'O\'Connor','Doctor'),
	(2,1,'Regan','Nurse'),
	(3,1,'Kilfeather','Nurse'),
	(4,1,'Grace','Doctor');

/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;

INSERT INTO `tbl_migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1322589021),
	('m111128_223507_reverse_bed_patient',1322589023);

/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ward
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ward`;

CREATE TABLE `ward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mac` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ward_hospital1` (`hospital_id`),
  CONSTRAINT `fk_ward_hospital1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ward` WRITE;
/*!40000 ALTER TABLE `ward` DISABLE KEYS */;

INSERT INTO `ward` (`id`, `hospital_id`, `name`, `mac`)
VALUES
	(1,1,'Cardiology','0a-1b-3c-4d-5e-6f'),
	(2,1,'Ear Nose and Throat (ENT)','0f-1b-3c-4d-5e-6a'),
	(3,1,'Gastroenterology','00:00:00:00:11:AA'),
	(4,1,'Haematology','00-45-12-1f-d5-cd'),
	(5,1,'Microbiology','00-50-8D-B2-E6-96'),
	(6,1,'Neurology','00:16:3E:A3:EB:83'),
	(7,1,'Occupational therapy','00:16:3E:1B:98:5E'),
	(8,1,'Orthopaedics','00:16:3E:96:D5:D9'),
	(9,1,'Pharmacy','00:16:3E:0E:F2:A2'),
	(10,1,'Physiotherapy','00:16:3E:C8:15:9A'),
	(11,1,'Radiotherapy','00:05:69:CB:CD:DE'),
	(12,1,'Urology','00:50:56:31:EA:2C');

/*!40000 ALTER TABLE `ward` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
