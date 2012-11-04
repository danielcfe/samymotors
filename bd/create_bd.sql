SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `sammy_test` DEFAULT CHARACTER SET utf8 ;
USE `sammy_test` ;

-- -----------------------------------------------------
-- Table `sammy_test`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sammy_test`.`users` ;

CREATE  TABLE IF NOT EXISTS `sammy_test`.`users` (
  `login` VARCHAR(20) NOT NULL COMMENT 'Login para inicio de sesiones' ,
  `name` VARCHAR(50) NULL COMMENT 'Nombre del usuario' ,
  `password` VARCHAR(32) NULL COMMENT 'Clave, encriptada mediante md5' ,
  `email` VARCHAR(50) NOT NULL COMMENT 'email del usuario. Debe ser unico' ,
  `type` TINYINT UNSIGNED NULL COMMENT 'Indica tipo de usuairo. 0 = Admin, 1 = supervisor, 2 = vendedor, 3 = cobranzas' ,
  PRIMARY KEY (`login`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sammy_test`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sammy_test`.`orders` ;

CREATE  TABLE IF NOT EXISTS `sammy_test`.`orders` (
  `idorders` INT NOT NULL ,
  `users_login` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`idorders`, `users_login`) ,
  INDEX `order_user` (`users_login` ASC) ,
  CONSTRAINT `order_user`
    FOREIGN KEY (`users_login` )
    REFERENCES `sammy_test`.`users` (`login` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sammy_test`.`clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sammy_test`.`clients` ;

CREATE  TABLE IF NOT EXISTS `sammy_test`.`clients` (
  `idclients` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `zone` INT NULL ,
  `users_login` VARCHAR(20) NULL ,
  PRIMARY KEY (`idclients`) ,
  INDEX `fk_clients_users1` (`users_login` ASC) ,
  CONSTRAINT `fk_clients_users1`
    FOREIGN KEY (`users_login` )
    REFERENCES `sammy_test`.`users` (`login` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `sammy_test`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `sammy_test`;
INSERT INTO `sammy_test`.`users` (`login`, `name`, `password`, `email`, `type`) VALUES ('zdaniel', 'Daniel Zambrano', '202cb962ac59075b964b07152d234b70', 'xzdasx@gmail.com', 0);
INSERT INTO `sammy_test`.`users` (`login`, `name`, `password`, `email`, `type`) VALUES ('vendedor', 'Vendedor 1', '202cb962ac59075b964b07152d234b70', 'other@asd.com', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `sammy_test`.`clients`
-- -----------------------------------------------------
START TRANSACTION;
USE `sammy_test`;
INSERT INTO `sammy_test`.`clients` (`idclients`, `name`, `zone`, `users_login`) VALUES (1, 'Perolito', 2, 'vendedor');
INSERT INTO `sammy_test`.`clients` (`idclients`, `name`, `zone`, `users_login`) VALUES (2, 'Aceitero', 2, 'vendedor');

COMMIT;
