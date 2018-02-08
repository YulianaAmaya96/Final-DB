-- -----------------------------------------------------
-- Table `agendaNextU`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendaNextU`.`Evento` (
  `idEvento` INT NOT NULL,
  `tituloEvento` VARCHAR(45) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `horaInicio` TIME NULL,
  `fechaFin` DATE NULL,
  `horaFin` TIME NULL,
  `diaCompleto` TINYINT NOT NULL,
  PRIMARY KEY (`idEvento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendaNextU`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendaNextU`.`Usuario` (
  `correoElectronico` VARCHAR(45) NOT NULL,
  `nombreCompleto` VARCHAR(60) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `fechaNacimiento` DATE NULL,
  PRIMARY KEY (`correoElectronico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agendaNextU`.`Evento_has_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agendaNextU`.`Evento_has_Usuario` (
  `Evento_idEvento` INT NOT NULL,
  `Usuario_correoElectronico` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Evento_idEvento`, `Usuario_correoElectronico`),
  INDEX `fk_Evento_has_Usuario_Usuario1_idx` (`Usuario_correoElectronico` ASC),
  INDEX `fk_Evento_has_Usuario_Evento_idx` (`Evento_idEvento` ASC),
  CONSTRAINT `fk_Evento_has_Usuario_Evento`
    FOREIGN KEY (`Evento_idEvento`)
    REFERENCES `agendaNextU`.`Evento` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_has_Usuario_Usuario1`
    FOREIGN KEY (`Usuario_correoElectronico`)
    REFERENCES `agendaNextU`.`Usuario` (`correoElectronico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;