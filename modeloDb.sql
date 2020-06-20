-- MySQL Script generated by MySQL Workbench
-- Sat Jun 20 15:08:22 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema pw2020
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pw2020
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pw2020` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `pw2020` ;

-- -----------------------------------------------------
-- Table `pw2020`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`alumno` (
  `noControl` INT(50) NOT NULL,
  `nombres` VARCHAR(50) NOT NULL,
  `apellidoP` VARCHAR(50) NOT NULL,
  `apellidoM` VARCHAR(50) NOT NULL,
  `NIP` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`noControl`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`aula` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(59) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`materia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `creditos` INT(11) NOT NULL,
  `unidades` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`personal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NOT NULL,
  `contraseña` VARCHAR(50) NOT NULL,
  `tipoUsuario` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
