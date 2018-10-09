-- MySQL Workbench Synchronization
-- Generated: 2018-10-09 11:15
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: home

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE TABLE IF NOT EXISTS `skambitdb`.`usuarios` (
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT,
  `primeiro_nome` VARCHAR(10) NOT NULL,
  `ultimo_nome` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `login` VARCHAR(10) NOT NULL,
  `senha` VARCHAR(8) NOT NULL,
  `avatar` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `data` DATETIME NOT NULL,
  `status_id` TINYINT(4) NOT NULL,
  `rating` DECIMAL NULL DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE INDEX `ultimo_nome_UNIQUE` (`ultimo_nome` ASC),
  INDEX `status_id_usuarios` (`status_id` ASC),
  CONSTRAINT `fk_status_id_usuarios`
    FOREIGN KEY (`status_id`)
    REFERENCES `skambitdb`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`cad_produto` (
  `produto_id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(250) NOT NULL,
  `data` DATETIME NOT NULL,
  `status_id` TINYINT(4) NOT NULL,
  `valor` DECIMAL NOT NULL,
  PRIMARY KEY (`produto_id`),
  INDEX `usuario_id_produto` (`usuario_id` ASC),
  INDEX `status_id_produto` (`status_id` ASC),
  CONSTRAINT `fk_usuario_id`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `skambitdb`.`usuarios` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_id_produto`
    FOREIGN KEY (`status_id`)
    REFERENCES `skambitdb`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`foto_prod` (
  `foto_id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto_id` INT(11) NOT NULL,
  `data_upload` DATETIME NOT NULL,
  `status_id` TINYINT(4) NOT NULL,
  PRIMARY KEY (`foto_id`),
  INDEX `produto_id_foto` (`produto_id` ASC),
  INDEX `status_id_foto_prod` (`status_id` ASC),
  CONSTRAINT `fk_produto_id`
    FOREIGN KEY (`produto_id`)
    REFERENCES `skambitdb`.`cad_produto` (`produto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_id_foto`
    FOREIGN KEY (`status_id`)
    REFERENCES `skambitdb`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`status` (
  `status_id` TINYINT(4) NOT NULL,
  `status` TINYINT(4) NOT NULL,
  PRIMARY KEY (`status_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`categoria` (
  `categoria_id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`categoria_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`ligacao_cat_prod` (
  `cat_prod_id` INT(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` INT(11) NOT NULL,
  `produto_id` INT(11) NOT NULL,
  PRIMARY KEY (`cat_prod_id`),
  INDEX `categoria_id_produto` (`categoria_id` ASC),
  INDEX `produto_id_categoria` (`produto_id` ASC),
  CONSTRAINT `fk_categoria_id_lig`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `skambitdb`.`categoria` (`categoria_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_id_lig`
    FOREIGN KEY (`produto_id`)
    REFERENCES `skambitdb`.`cad_produto` (`produto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`ligacao_likes` (
  `like_id` INT(11) NOT NULL,
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto_id` INT(11) NULL DEFAULT NULL,
  `data` DATETIME NOT NULL,
  `status_id` TINYINT(4) NOT NULL,
  PRIMARY KEY (`like_id`),
  INDEX `usuario_id_likes` (`usuario_id` ASC),
  INDEX `produto_id_likes` (`produto_id` ASC),
  INDEX `status_id_likes` (`status_id` ASC),
  CONSTRAINT `fk_usuario_id_likes`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `skambitdb`.`usuarios` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_id_likes`
    FOREIGN KEY (`produto_id`)
    REFERENCES `skambitdb`.`cad_produto` (`produto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_id_likes`
    FOREIGN KEY (`status_id`)
    REFERENCES `skambitdb`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `skambitdb`.`ligacao_matches` (
  `match_id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto_id_a` INT(11) NOT NULL,
  `produto_id_b` INT(11) NOT NULL,
  `data` DATETIME NOT NULL,
  `status_id` TINYINT(4) NOT NULL,
  PRIMARY KEY (`match_id`),
  INDEX `produto_id_a` (`produto_id_a` ASC),
  INDEX `produto_id_b` (`produto_id_b` ASC),
  INDEX `status_id_match` (`status_id` ASC),
  CONSTRAINT `fk_produto_id_a`
    FOREIGN KEY (`produto_id_a`)
    REFERENCES `skambitdb`.`cad_produto` (`produto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_id_b`
    FOREIGN KEY (`produto_id_b`)
    REFERENCES `skambitdb`.`cad_produto` (`produto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_id_match`
    FOREIGN KEY (`status_id`)
    REFERENCES `skambitdb`.`status` (`status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
