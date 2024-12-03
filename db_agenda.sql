CREATE DATABASE IF NOT EXISTS `db_agenda`;
USE `db_agenda`;

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) NOT NULL DEFAULT '0',
  `propietario` varchar(255) NOT NULL DEFAULT '0',
  `estado` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '0',
  `correo` varchar(255) NOT NULL DEFAULT '0',
  `contraseña` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
