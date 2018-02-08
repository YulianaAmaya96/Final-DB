SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema agendaNextU
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agendaNextU
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agendaNextU` ;
USE `agendaNextU` ;

-- -----------------------------------------------------
-- Table `agendaNextU`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendaNextU`.`Usuario` (
  `correoElectronico` VARCHAR(45) NOT NULL,
  `nombreCompleto` VARCHAR(60) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `Evento_idEvento` INT NOT NULL,
  PRIMARY KEY (`correoElectronico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendaNextU`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendaNextU`.`Evento` (
  `idEvento` INT NOT NULL,
  `tituloEvento` VARCHAR(45) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `horaInicio` TIME NULL DEFAULT NULL,
  `fechaFin` DATE NULL DEFAULT NULL,
  `horaFin` TIME NULL DEFAULT NULL,
  `diaCompleto` TINYINT NOT NULL,
  `Usuario_correoElectronico` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Evento_Usuario_idx` (`Usuario_correoElectronico` ASC),
  CONSTRAINT `fk_Evento_Usuario`
    FOREIGN KEY (`Usuario_correoElectronico`)
    REFERENCES `agendaNextU`.`Usuario` (`correoElectronico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
