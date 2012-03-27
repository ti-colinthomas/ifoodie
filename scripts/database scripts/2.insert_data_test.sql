SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP USER `db_admin_ifoodie`@`localhost`;
DROP DATABASE IF EXISTS `ifoodie` ;


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ifoodie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ifoodie` ;
SHOW WARNINGS;

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
  `date` DATE NOT NULL ,
  `paymentMethod` TEXT NOT NULL ,
  `discount` FLOAT NULL ,
  `totalCost` FLOAT NOT NULL ,
  PRIMARY KEY (`orderId`) )
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
  PRIMARY KEY (`itemOrderId`) ,
  INDEX `fk_itemOrder_itemDetails1` (`itemId` ASC) ,
  INDEX `fk_itemOrder_order1` (`orderId` ASC) ,
  CONSTRAINT `fk_itemOrder_itemDetails1`
    FOREIGN KEY (`itemId` )
    REFERENCES `ifoodie`.`itemDetails` (`itemId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itemOrder_order1`
    FOREIGN KEY (`orderId` )
    REFERENCES `ifoodie`.`order` (`orderId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`masters`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`masters` (
  `mastersId` INT NOT NULL AUTO_INCREMENT ,
  `key` VARCHAR(45) NOT NULL ,
  `value` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`mastersId`) )
ENGINE = InnoDB;

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

-- -----------------------------------------------------
-- Table `ifoodie`.`queue`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`queue` (
  `queueId` INT NOT NULL AUTO_INCREMENT ,
  `itemOrderId` INT NOT NULL ,
  `eta` INT NULL ,
  PRIMARY KEY (`queueId`) ,
  INDEX `fk_queue_itemOrder1` (`itemOrderId` ASC) ,
  CONSTRAINT `fk_queue_itemOrder1`
    FOREIGN KEY (`itemOrderId` )
    REFERENCES `ifoodie`.`itemOrder` (`itemOrderId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ifoodie`.`device`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ifoodie`.`device` (
  `deviceIdentifier` VARCHAR(45) NULL ,
  `tablenumber` VARCHAR(45) NULL ,
  PRIMARY KEY (`deviceIdentifier`) )
ENGINE = InnoDB;

SHOW WARNINGS;

CREATE USER 'db_admin_ifoodie'@'localhost' IDENTIFIED BY 'ifoodiePwds12';
GRANT ALL PRIVILEGES ON * . * TO 'db_admin_ifoodie'@'localhost' IDENTIFIED BY 'ifoodiePwds12' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON `ifoodie` . * TO 'db_admin_ifoodie'@'localhost' WITH GRANT OPTION ;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- Adding category
INSERT INTO `ifoodie`.`category` (categoryName, priority)
VALUES
(
'Starters','1'
);

INSERT INTO `ifoodie`.`category` (categoryName, priority)
VALUES
(
'Salads','2'
);

INSERT INTO `ifoodie`.`category` (categoryId, categoryName, priority)
VALUES
(
'33', 'Main Course','23'
);

INSERT INTO `ifoodie`.`category` (categoryId, categoryName, priority)
VALUES
(
'34', 'Desserts','24'
);


-- Adding itemsDetails
-- Starters
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Zucchini Toast','description for ZT',60,1,10,30,1
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Oats Tikki','description Oats here',50,1,10,40,1
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Crispy Chicken','description OCNS here',125,0,20,150,1
);

-- Salads
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Bermuda Spinach Salad','description for BSS',50,1,10,60,2
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Macaroni Salad','description MS here',80,1,10,80,2
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Oriental Cold Noodle Salad','description OCNS here',75,1,10,50,2
);

-- Main Course
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Mutter Paneer','description for mutter paneer here',40,1,10,60,3
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Mutton Kadai','description mutton kadai here',120,0,15,180,3
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Hyderabadi Kheema','description hyderabadi kheema here',135,0,15,150,3
);

-- Deserts
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Ice Cream - Vanilla','Vanilla flavoured ice cream',50,1,5,70,4
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Caramel Custard','Fruit custard',80,1,5,100,4
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Triffle Pudding','Sweet pudding',75,1,5,120,4
);
 

 
-- Adding users
INSERT INTO `ifoodie`.`users`
(
`uname`,`password`,`fName`,`lName`,`role`
)
VALUES
(
'stevej','123','Steve','Jobs','Admin'
);

INSERT INTO `ifoodie`.`users`
(
`uname`,`password`,`fName`,`lName`,`role`
)
VALUES
(
'jominj','123','Jomin','Joseph','User'
);


-- Adding order
INSERT INTO `ifoodie`.`order`
(
`date`,`paymentMethod`,`discount`,`totalCost`
)
VALUES
(
'2012-02-21','CASH',0,0
);


-- Adding itemorder
INSERT INTO `ifoodie`.`itemorder` 
(
itemId, orderId, quantity, cost
)
VALUES
(
3,1, 2,250
);


-- Adding queue
INSERT INTO `ifoodie`.`queue`
(
`itemOrderId`,
`eta`
)
VALUES
(
1,30
);
