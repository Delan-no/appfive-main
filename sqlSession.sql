-- Listage de la structure de la base pour highfive
DROP DATABASE IF EXISTS `testproj`;
CREATE DATABASE IF NOT EXISTS `testproj` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `testproj`;

-- Listage de la structure de la table highfive. admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_name` text COLLATE utf8mb4_unicode_ci,
  `admin_surname` text COLLATE utf8mb4_unicode_ci,
  `admin_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_password` text COLLATE utf8mb4_unicode_ci,
  `isenabled` int(11) DEFAULT NULL,
  `isadmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table highfive.admins : ~4 rows (environ)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
REPLACE INTO `admins` (`id`, `admin_name`, `admin_surname`, `admin_login`, `admin_password`, `isenabled`, `isadmin`) VALUES
	(1, 'TOHON', 'Josue', 'josue.tohon', '$2y$10$G4LlnPXRLytMoKjotP5vUue5WnKk44u/cuzdqK.mm7khzUK6yPgQi', 1, 2),
	(2, 'KOUAGOU', 'Tiburce', 'tiburce.kouagou', NULL, 1, 2),
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Listage de la structure de la table highfive. sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quota` varchar(255) NOT NULL,
  `session_date` date NOT NULL,
  `session_time` time NOT NULL,
  `test_step_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_step_id` (`test_step_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`test_step_id`) REFERENCES `test_steps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;



-- Listage des données de la table highfive.sessions : ~8 rows (environ)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
REPLACE INTO `sessions` (`id`, `quota`, `session_date`, `session_time`, `test_step_id`, `admin_id`) VALUES
	(1, '15', '2022-08-16', '08:30:00', 2, 1),
	(2, '15', '2022-08-19', '14:00:00', 2, 1),
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;


-- Listage de la structure de la table highfive. step_sections
DROP TABLE IF EXISTS `step_sections`;
CREATE TABLE IF NOT EXISTS `step_sections` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_steps_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_steps_id` (`test_steps_id`),
  CONSTRAINT `step_sections_ibfk_1` FOREIGN KEY (`test_steps_id`) REFERENCES `test_steps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Listage des données de la table highfive.step_sections : ~17 rows (environ)
/*!40000 ALTER TABLE `step_sections` DISABLE KEYS */;
REPLACE INTO `step_sections` (`id`, `uuid`, `section_name`, `test_steps_id`) VALUES
	(1, 'a6f6826b-721d-3473-a6a6-49be5c9568f4', 'Analogie visuelle', 2),
	(2, 'd3b1d872-d210-31b0-9ad0-44a6c0c3d7f4', 'Serie numerique', 2),
/*!40000 ALTER TABLE `step_sections` ENABLE KEYS */;


-- Listage de la structure de la table highfive. test_steps
DROP TABLE IF EXISTS `test_steps`;
CREATE TABLE IF NOT EXISTS `test_steps` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table highfive.test_steps : ~5 rows (environ)
/*!40000 ALTER TABLE `test_steps` DISABLE KEYS */;
REPLACE INTO `test_steps` (`id`, `uuid`, `step_name`) VALUES
	(2, 'd51d8ead-281b-45aa-8519-f69c976b2286', 'Test psychotechnique'),
	(3, '5c00d18b-9308-4dd0-b4ac-f33d2396e435', 'Test collectif'),
	(4, '1f4ec71c-0dee-4482-8bbd-3c2d9ab0db1a', 'Test individuel'),
  (5, '540b4157-e86c-46bc-bfad-d79df70075eb', 'Demarrage Formation'),
	(6, '11c7299b-e642-4643-956b-72d46c7d80e3', 'Etude de dossiers');
/*!40000 ALTER TABLE `test_steps` ENABLE KEYS */;


