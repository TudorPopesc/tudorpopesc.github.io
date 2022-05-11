-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6376
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for company
CREATE DATABASE IF NOT EXISTS `company` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `company`;

-- Dumping structure for table company.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table company.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id_admin`, `login`, `password`, `role`) VALUES
	(1, 'tudorvalentine', '33d890d33f91d52fc9b405a0dda65336', 1),
	(2, 'daria', '6a8c12e3134a6dac4cd886fb7f4aaf58', 0),
	(3, 'elena_09', 'fadf17141f3f9c3389d10d09db99f757', 1),
	(4, 'gheorg_89', '8c14af8a19c4b0d77a4fc68ac3dfafb0', 0);

-- Dumping structure for table company.intrebari
CREATE TABLE IF NOT EXISTS `intrebari` (
  `id_intrebare` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `intrebare` varchar(50) DEFAULT NULL,
  `raspuns` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_intrebare`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table company.intrebari: ~0 rows (approximately)
INSERT INTO `intrebari` (`id_intrebare`, `nume`, `email`, `intrebare`, `raspuns`) VALUES
	(1, 'Tudor', 'tudor1903@gmail.com', 'Cum sa fac?', 'Cum scrie în carte!!'),
	(2, 'Dumitru', 'dum1@gmaill.com', 'Livrarea este gratuita?', 'Da, este gratuită!!');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
