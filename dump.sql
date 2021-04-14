-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbloja
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbloja
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbloja` DEFAULT CHARACTER SET latin1 ;
USE `dbloja` ;

-- -----------------------------------------------------
-- Table `dbloja`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbloja`.`marca` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dbloja`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbloja`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `marca_id` INT(11) NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `preco` DOUBLE(10,2) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `dataCadastro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `produto_marca_fk` (`marca_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
