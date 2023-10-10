

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

-- Listage de la structure de la table highfive. test_steps
DROP TABLE IF EXISTS `test_steps`;
CREATE TABLE IF NOT EXISTS `test_steps` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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