-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.9-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win64
-- Workbench Version:             6.3.7.1199
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de table videoinit. adherent
CREATE TABLE IF NOT EXISTS `adherent` (
  `NUM_ADHERENT` int(4) NOT NULL AUTO_INCREMENT,
  `LOGIN_ADHERENT` varchar(15) NOT NULL,
  `PWD_ADHERENT` varchar(15) NOT NULL,
  `NOM_ADHERENT` varchar(25) NOT NULL DEFAULT '',
  `PRENOM_ADHERENT` varchar(20) NOT NULL DEFAULT '',
  `ADR_ADHERENT` varchar(32) NOT NULL DEFAULT '',
  `ADR2_ADHERENT` varchar(32) DEFAULT NULL,
  `CODEPOSTAL_ADHERENT` varchar(5) DEFAULT NULL,
  `VILLE_ADHERENT` varchar(25) DEFAULT NULL,
  `TEL_ADHERENT` varchar(15) DEFAULT NULL,
  `DATE_ADHESION` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `REF_PIECE_IDENTITE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NUM_ADHERENT`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table videoinit.adherent : 0 rows
/*!40000 ALTER TABLE `adherent` DISABLE KEYS */;
/*!40000 ALTER TABLE `adherent` ENABLE KEYS */;


-- Export de la structure de table videoinit. film
CREATE TABLE IF NOT EXISTS `film` (
  `ID_FILM` int(6) NOT NULL AUTO_INCREMENT,
  `CODE_TYPE_FILM` char(3) NOT NULL DEFAULT '',
  `TITRE_FILM` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ANNEE_FILM` int(4) NOT NULL DEFAULT '0',
  `REF_IMAGE` varchar(50) DEFAULT NULL,
  `RESUME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_FILM`),
  KEY `CODE_TYPE_FILM` (`CODE_TYPE_FILM`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`CODE_TYPE_FILM`) REFERENCES `typefilm` (`CODE_TYPE_FILM`)
) ENGINE=InnoDB AUTO_INCREMENT=7854552 DEFAULT CHARSET=utf8;

-- Export de données de la table videoinit.film : ~0 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
/*!40000 ALTER TABLE `film` ENABLE KEYS */;


-- Export de la structure de table videoinit. location
CREATE TABLE IF NOT EXISTS `location` (
  `NUM_ADHERENT` int(4) NOT NULL DEFAULT '0',
  `ID_FILM` int(6) NOT NULL DEFAULT '0',
  `DEBUT_LOCATION` date NOT NULL DEFAULT '0000-00-00',
  `DATE_RETOUR` date DEFAULT NULL,
  `TARIF_APPLIQUE` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`NUM_ADHERENT`,`ID_FILM`,`DEBUT_LOCATION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Export de données de la table videoinit.location : 0 rows
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;


-- Export de la structure de table videoinit. typefilm
CREATE TABLE IF NOT EXISTS `typefilm` (
  `CODE_TYPE_FILM` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `LIB_TYPE_FILM` varchar(25) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`CODE_TYPE_FILM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Export de données de la table videoinit.typefilm : ~4 rows (environ)
/*!40000 ALTER TABLE `typefilm` DISABLE KEYS */;
INSERT INTO `typefilm` (`CODE_TYPE_FILM`, `LIB_TYPE_FILM`) VALUES
	('AVE', 'Aventure'),
	('COM', 'Comédie'),
	('DES', 'Dessin animé'),
	('POL', 'Policier');
/*!40000 ALTER TABLE `typefilm` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
