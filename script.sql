-- MySQL Workbench Synchronization
-- Generated: 2018-08-08 21:02
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Oliveira

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `herois` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `herois`.`personagem` (
  `id_personagem` INT(11) NOT NULL AUTO_INCREMENT,
  `per_nome` VARCHAR(60) NOT NULL,
  `per_vida` INT(11) NOT NULL,
  `per_defesa` INT(11) NOT NULL,
  `per_dano` INT(11) NOT NULL,
  `per_vel_ataque` DECIMAL(19,2) NOT NULL,
  `per_vel_mov` INT(11) NOT NULL,
  `id_especialidade` INT(11) NOT NULL,
  PRIMARY KEY (`id_personagem`),
  INDEX `fk_especialidade_idx` (`id_especialidade` ASC),
  CONSTRAINT `fk_especialidade`
    FOREIGN KEY (`id_especialidade`)
    REFERENCES `herois`.`especialidade` (`id_especialidade`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `herois`.`especialidade` (
  `id_especialidade` INT(11) NOT NULL AUTO_INCREMENT,
  `esp_nome` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_especialidade`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO especialidade(id_especialidade,esp_nome)
VALUES (1,"Antitanque")
,(2,"Ataque em área")
,(3,"Tanker")
,(4,"Matador de chefes")
,(5,"Ataque à distância")
,(6,"Invocação")
,(7,"Cura")
,(8,"Magia Branca");

CREATE TABLE IF NOT EXISTS `herois`.`tipo` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT,
  `tip_nome` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO tipo(id_tipo,tip_nome)
VALUES (1,"Mago"),
(2,"Sacerdote"),
(3,"Lutador"),
(4,"Arqueiro"),
(5,"Cavaleiro"),
(6,"Espadachim");

CREATE TABLE IF NOT EXISTS `herois`.`tipo_personagem` (
  `id_tipo` INT(11) NOT NULL,
  `id_personagem` INT(11) NOT NULL,
  PRIMARY KEY (`id_tipo`, `id_personagem`),
  INDEX `fk_tipo__personagem_personagem1_idx` (`id_personagem` ASC),
  INDEX `fk_tipo_personagem_tipo1_idx` (`id_tipo` ASC),
  CONSTRAINT `fk_tipo_personagem_tipo1`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `herois`.`tipo` (`id_tipo`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_personagem_personagem1`
    FOREIGN KEY (`id_personagem`)
    REFERENCES `herois`.`personagem` (`id_personagem`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `herois`.`avatar` (
  `id_avatar` INT(11) NOT NULL AUTO_INCREMENT,
  `ava_img` BLOB NOT NULL,
  `id_personagem` INT(11) NOT NULL,
  PRIMARY KEY (`id_avatar`),
  INDEX `fk_personagem1_idx` (`id_personagem` ASC),
  CONSTRAINT `fk_avatar_personagem1`
    FOREIGN KEY (`id_personagem`)
    REFERENCES `herois`.`personagem` (`id_personagem`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
