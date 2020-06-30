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
CREATE SCHEMA IF NOT EXISTS `pw2020` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `pw2020` ;

-- -----------------------------------------------------
-- Table `pw2020`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`alumno` (
  `id` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `noControl` VARCHAR(50) NULL DEFAULT NULL,
  `nombres` VARCHAR(50) NOT NULL,
  `apellidoP` VARCHAR(50) NOT NULL,
  `apellidoM` VARCHAR(50) NOT NULL,
  `NIP` VARCHAR(100) NOT NULL,
  `semestre` INT(50) NOT NULL,
  `idReticula` INT(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`alumno_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`alumno_grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` INT(11) NOT NULL,
  `idGrupo` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 63
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`aula` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(59) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`calificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`calificacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` INT(11) NOT NULL,
  `idAlumno` INT(11) NOT NULL,
  `unidad1` INT(11) NOT NULL,
  `unidad2` INT(11) NOT NULL,
  `unidad3` INT(11) NOT NULL,
  `unidad4` INT(11) NOT NULL,
  `unidad5` INT(11) NOT NULL,
  `unidad6` INT(11) NOT NULL,
  `unidad7` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`carrera` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idMateria` INT(11) NOT NULL,
  `idProfesor` INT(11) NOT NULL,
  `grupo` VARCHAR(2) NOT NULL,
  `limite` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`horario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` INT(11) NOT NULL,
  `idAula` INT(11) NOT NULL,
  `diaSemana` INT(11) NOT NULL,
  `horaInicio` TIME NOT NULL,
  `horaFin` TIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`materia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `creditos` INT(11) NOT NULL,
  `unidades` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`personal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NOT NULL,
  `nombre` VARCHAR(59) NOT NULL,
  `apellidoP` VARCHAR(100) NOT NULL,
  `apellidoM` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(50) NOT NULL,
  `tipoUsuario` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`reticula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`reticula` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `max_creditos` INT(11) NOT NULL,
  `anio` INT(11) NOT NULL,
  `idCarrera` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `pw2020`.`reticula_materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pw2020`.`reticula_materia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idReticula` INT(11) NOT NULL,
  `idMateria` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
