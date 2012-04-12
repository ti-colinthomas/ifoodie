SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ifoodie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `ifoodie` ;

-- -----------------------------------------------------
-- Table `ifoodie`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`category` (
  `categoryId` INT NOT NULL AUTO_INCREMENT ,
  `categoryName` TEXT NOT NULL ,
  `priority` INT NOT NULL ,
  PRIMARY KEY (`categoryId`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`itemDetails`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`itemDetails` (
  `itemId` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NOT NULL ,
  `description` TEXT NOT NULL ,
  `cost` FLOAT NOT NULL ,
  `cookingTime` INT NOT NULL ,
  `calorieCount` FLOAT NOT NULL ,
  `categoryId` INT NOT NULL ,
  `veg` INT NULL ,
  `likes` INT NULL DEFAULT 0 ,
  `dislikes` INT NULL DEFAULT 0 ,
  PRIMARY KEY (`itemId`) ,
  INDEX `fk_itemDetails_category` (`categoryId` ASC) ,
  CONSTRAINT `fk_itemDetails_category`
    FOREIGN KEY (`categoryId` )
    REFERENCES `ifoodie`.`category` (`categoryId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`images`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`images` (
  `imageId` INT NOT NULL AUTO_INCREMENT ,
  `link` TEXT NOT NULL ,
  `itemId` INT NOT NULL ,
  `type` VARCHAR(6) NULL ,
  PRIMARY KEY (`imageId`) ,
  INDEX `fk_images_itemDetails` (`itemId` ASC) ,
  CONSTRAINT `fk_images_itemDetails`
    FOREIGN KEY (`itemId` )
    REFERENCES `ifoodie`.`itemDetails` (`itemId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`ratings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`ratings` (
  `rid` INT NOT NULL AUTO_INCREMENT ,
  `rating` INT NOT NULL ,
  `count` INT NOT NULL ,
  `itemId` INT NOT NULL ,
  PRIMARY KEY (`rid`) ,
  INDEX `fk_ratings_itemDetails` (`itemId` ASC) ,
  CONSTRAINT `fk_ratings_itemDetails`
    FOREIGN KEY (`itemId` )
    REFERENCES `ifoodie`.`itemDetails` (`itemId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`order`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`order` (
  `orderId` INT NOT NULL AUTO_INCREMENT ,
  `date` DATE NULL ,
  `paymentMethod` TEXT NULL ,
  `discount` FLOAT NULL ,
  `totalCost` FLOAT NULL ,
  `status` VARCHAR(45) NOT NULL ,
  `deviceId` VARCHAR(90) NOT NULL ,
  PRIMARY KEY (`orderId`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`table`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`table` (
  `tableId` INT NOT NULL AUTO_INCREMENT ,
  `tableName` VARCHAR(45) NOT NULL ,
  `deviceIdentifier` VARCHAR(45) NULL ,
  PRIMARY KEY (`tableId`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`itemOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`itemOrder` (
  `itemOrderId` INT NOT NULL AUTO_INCREMENT ,
  `itemId` INT NOT NULL ,
  `orderId` INT NOT NULL ,
  `instructions` TEXT NULL ,
  `quantity` INT NOT NULL DEFAULT 1 ,
  `cost` FLOAT NOT NULL ,
  `tableId` INT NOT NULL ,
  PRIMARY KEY (`itemOrderId`) ,
  INDEX `fk_itemOrder_itemDetails1` (`itemId` ASC) ,
  INDEX `fk_itemOrder_order1` (`orderId` ASC) ,
  INDEX `fk_itemOrder_table1` (`tableId` ASC) ,
  CONSTRAINT `fk_itemOrder_itemDetails1`
    FOREIGN KEY (`itemId` )
    REFERENCES `ifoodie`.`itemDetails` (`itemId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemOrder_order1`
    FOREIGN KEY (`orderId` )
    REFERENCES `ifoodie`.`order` (`orderId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemOrder_table1`
    FOREIGN KEY (`tableId` )
    REFERENCES `ifoodie`.`table` (`tableId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`masters`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`masters` (
  `mastersId` INT NOT NULL AUTO_INCREMENT ,
  `masterKey` VARCHAR(45) NOT NULL ,
  `masterValue` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`mastersId`) )
ENGINE = InnoDB
COMMENT = '																';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`users` (
  `userId` INT NOT NULL AUTO_INCREMENT ,
  `uname` TEXT NOT NULL ,
  `password` TEXT NOT NULL ,
  `fName` TEXT NOT NULL ,
  `lName` TEXT NOT NULL ,
  `role` TEXT NOT NULL ,
  PRIMARY KEY (`userId`) )
ENGINE = InnoDB;

SHOW WARNINGS;

CREATE USER 'db_admin_ifoodie'@'localhost' IDENTIFIED BY 'ifoodiePwds12';
GRANT ALL PRIVILEGES ON * . * TO 'db_admin_ifoodie'@'localhost' IDENTIFIED BY 'ifoodiePwds12' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON `ifoodie` . * TO 'db_admin_ifoodie'@'localhost' WITH GRANT OPTION ;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
