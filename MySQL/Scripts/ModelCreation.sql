-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema BirdDatabase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BirdDatabase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BirdDatabase` ;
USE `BirdDatabase` ;

-- -----------------------------------------------------
-- Table `BirdDatabase`.`User_Table`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`User_Table` (
  `User_Id` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NOT NULL,
  `First_Name` VARCHAR(45) NULL,
  `Last_Name` VARCHAR(45) NULL,
  `User_Password` VARCHAR(45) NOT NULL,
  `Admin` INT NOT NULL DEFAULT 0,
  `User_Type` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`User_Id`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Class` (
  `Class_Id` INT NOT NULL AUTO_INCREMENT,
  `Class_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Class_Id`),
  UNIQUE INDEX `Class_Name_UNIQUE` (`Class_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Order` (
  `Order_Id` INT NOT NULL AUTO_INCREMENT,
  `Order_Name` VARCHAR(45) NOT NULL,
  `FK_Class_Id` INT NOT NULL,
  PRIMARY KEY (`Order_Id`, `FK_Class_Id`),
  INDEX `fk_Order_Class1_idx` (`FK_Class_Id` ASC),
  CONSTRAINT `fk_Order_Class1`
    FOREIGN KEY (`FK_Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Sub_Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Sub_Order` (
  `Sub_Order_Id` INT NOT NULL AUTO_INCREMENT,
  `Sub_Order_Name` VARCHAR(45) NOT NULL,
  `FK_Order_Id` INT NOT NULL,
  `FK_Class_Id` INT NOT NULL,
  PRIMARY KEY (`Sub_Order_Id`, `FK_Order_Id`, `FK_Class_Id`),
  INDEX `fk_Sub_Order_Order1_idx` (`FK_Order_Id` ASC, `FK_Class_Id` ASC),
  CONSTRAINT `fk_Sub_Order_Order1`
    FOREIGN KEY (`FK_Order_Id` , `FK_Class_Id`)
    REFERENCES `BirdDatabase`.`Order` (`Order_Id` , `FK_Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Family`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Family` (
  `Family_Id` INT NOT NULL AUTO_INCREMENT,
  `Family_Name` VARCHAR(45) NOT NULL,
  `FK_Sub_Order_Id` INT NOT NULL,
  `FK_Order_Id` INT NOT NULL,
  `FK_Class_Id` INT NOT NULL,
  PRIMARY KEY (`Family_Id`, `FK_Sub_Order_Id`, `FK_Order_Id`, `FK_Class_Id`),
  INDEX `fk_Family_Sub_Order1_idx` (`FK_Sub_Order_Id` ASC, `FK_Order_Id` ASC, `FK_Class_Id` ASC),
  CONSTRAINT `fk_Family_Sub_Order1`
    FOREIGN KEY (`FK_Sub_Order_Id` , `FK_Order_Id` , `FK_Class_Id`)
    REFERENCES `BirdDatabase`.`Sub_Order` (`Sub_Order_Id` , `FK_Order_Id` , `FK_Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Gender` (
  `Gender_Id` INT NOT NULL AUTO_INCREMENT,
  `Gender_Name` VARCHAR(45) NOT NULL,
  `FK_Family_Id` INT NOT NULL,
  `FK_Order_Id` INT NOT NULL,
  `FK_Sub_Order_Id` INT NOT NULL,
  `FK_Class_Id` INT NOT NULL,
  PRIMARY KEY (`Gender_Id`, `FK_Family_Id`, `FK_Order_Id`, `FK_Sub_Order_Id`, `FK_Class_Id`),
  INDEX `fk_Gender_Family1_idx` (`FK_Family_Id` ASC, `FK_Order_Id` ASC, `FK_Sub_Order_Id` ASC, `FK_Class_Id` ASC),
  CONSTRAINT `fk_Gender_Family1`
    FOREIGN KEY (`FK_Family_Id`)
    REFERENCES `BirdDatabase`.`Family` (`Family_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Size` (
  `Size_Id` INT NOT NULL AUTO_INCREMENT,
  `Size_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Size_Id`),
  UNIQUE INDEX `Size_Name_UNIQUE` (`Size_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Habitat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Habitat` (
  `Habitat_Id` INT NOT NULL AUTO_INCREMENT,
  `Habitat_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Habitat_Id`),
  UNIQUE INDEX `Habitat_Name_UNIQUE` (`Habitat_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Beak_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Beak_Type` (
  `Beak_Type_Id` INT NOT NULL AUTO_INCREMENT,
  `Beak_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Beak_Type_Id`),
  UNIQUE INDEX `Beak_Name_UNIQUE` (`Beak_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Color` (
  `Color_Id` INT NOT NULL AUTO_INCREMENT,
  `Color_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Color_Id`),
  UNIQUE INDEX `Color_Name_UNIQUE` (`Color_Name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Offspring_Quantity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Offspring_Quantity` (
  `Offspring_Quantity_Id` INT NOT NULL AUTO_INCREMENT,
  `Quantity` INT NOT NULL,
  PRIMARY KEY (`Offspring_Quantity_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Species`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Species` (
  `Species_Id` INT NOT NULL AUTO_INCREMENT,
  `Species_Name` VARCHAR(45) NOT NULL,
  `FK_Gender_Id` INT NOT NULL,
  `FK_Family_Id` INT NOT NULL,
  `FK_Order_Id` INT NOT NULL,
  `FK_Sub_Order_Id` INT NOT NULL,
  `FK_Class_Id` INT NOT NULL,
  `FK_Size_Id` INT NOT NULL,
  `FK_Habitat_Id` INT NOT NULL,
  `FK_Beak_Type_Id` INT NOT NULL,
  `FK_Color_Id` INT NOT NULL,
  `FK_Offspring_Quantity_Id` INT NOT NULL,
  `FK_User_Id` INT NOT NULL,
  PRIMARY KEY (`Species_Id`, `FK_Gender_Id`, `FK_Family_Id`, `FK_Order_Id`, `FK_Sub_Order_Id`, `FK_Class_Id`, `FK_Size_Id`, `FK_Habitat_Id`, `FK_Beak_Type_Id`, `FK_Color_Id`, `FK_Offspring_Quantity_Id`, `FK_User_Id`),
  INDEX `fk_Species_Gender1_idx` (`FK_Gender_Id` ASC, `FK_Family_Id` ASC, `FK_Order_Id` ASC, `FK_Sub_Order_Id` ASC, `FK_Class_Id` ASC),
  INDEX `fk_Species_Size1_idx` (`FK_Size_Id` ASC),
  INDEX `fk_Species_Habitat1_idx` (`FK_Habitat_Id` ASC),
  INDEX `fk_Species_Beak_Type1_idx` (`FK_Beak_Type_Id` ASC),
  INDEX `fk_Species_Color1_idx` (`FK_Color_Id` ASC),
  INDEX `fk_Species_Offspring_Quantity1_idx` (`FK_Offspring_Quantity_Id` ASC),
  INDEX `fk_Species_User_Table1_idx` (`FK_User_Id` ASC),
  CONSTRAINT `fk_Species_Gender1`
    FOREIGN KEY (`FK_Gender_Id` , `FK_Family_Id` , `FK_Order_Id` , `FK_Sub_Order_Id` , `FK_Class_Id`)
    REFERENCES `BirdDatabase`.`Gender` (`Gender_Id` , `FK_Family_Id` , `FK_Order_Id` , `FK_Sub_Order_Id` , `FK_Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_Size1`
    FOREIGN KEY (`FK_Size_Id`)
    REFERENCES `BirdDatabase`.`Size` (`Size_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_Habitat1`
    FOREIGN KEY (`FK_Habitat_Id`)
    REFERENCES `BirdDatabase`.`Habitat` (`Habitat_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_Beak_Type1`
    FOREIGN KEY (`FK_Beak_Type_Id`)
    REFERENCES `BirdDatabase`.`Beak_Type` (`Beak_Type_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_Color1`
    FOREIGN KEY (`FK_Color_Id`)
    REFERENCES `BirdDatabase`.`Color` (`Color_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_Offspring_Quantity1`
    FOREIGN KEY (`FK_Offspring_Quantity_Id`)
    REFERENCES `BirdDatabase`.`Offspring_Quantity` (`Offspring_Quantity_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Species_User_Table1`
    FOREIGN KEY (`FK_User_Id`)
    REFERENCES `BirdDatabase`.`User_Table` (`User_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Image` (
  `Image_Id` INT NOT NULL AUTO_INCREMENT,
  `Image` BLOB NOT NULL,
  `User_Id` INT NOT NULL,
  `Animal_Id` INT NOT NULL,
  `Species_Species_Id` INT NOT NULL,
  `Species_Gender_Gender_Id` INT NOT NULL,
  `Species_Gender_Family_Family_Id` INT NOT NULL,
  `Species_Gender_Family_Order_Order_Id` INT NOT NULL,
  `Species_Gender_Family_Order_Sub_Order_Sub_Order_Id` INT NOT NULL,
  `Species_Gender_Family_Order_Sub_Order_Class_Class_Id` INT NOT NULL,
  `Species_Size_Size_Id` INT NOT NULL,
  `Species_Habitat_Habitat_Id` INT NOT NULL,
  `Species_Beak_Type_Beak_Type_Id` INT NOT NULL,
  `Species_Color_Color_Id` INT NOT NULL,
  `Species_Offspring_Quantity_Offspring_Quantity_Id` INT NOT NULL,
  PRIMARY KEY (`Image_Id`, `User_Id`, `Animal_Id`, `Species_Species_Id`, `Species_Gender_Gender_Id`, `Species_Gender_Family_Family_Id`, `Species_Gender_Family_Order_Order_Id`, `Species_Gender_Family_Order_Sub_Order_Sub_Order_Id`, `Species_Gender_Family_Order_Sub_Order_Class_Class_Id`, `Species_Size_Size_Id`, `Species_Habitat_Habitat_Id`, `Species_Beak_Type_Beak_Type_Id`, `Species_Color_Color_Id`, `Species_Offspring_Quantity_Offspring_Quantity_Id`),
  INDEX `fk_Image_User_idx` (`User_Id` ASC),
  INDEX `fk_Image_Species1_idx` (`Species_Species_Id` ASC, `Species_Gender_Gender_Id` ASC, `Species_Gender_Family_Family_Id` ASC, `Species_Gender_Family_Order_Order_Id` ASC, `Species_Gender_Family_Order_Sub_Order_Sub_Order_Id` ASC, `Species_Gender_Family_Order_Sub_Order_Class_Class_Id` ASC, `Species_Size_Size_Id` ASC, `Species_Habitat_Habitat_Id` ASC, `Species_Beak_Type_Beak_Type_Id` ASC, `Species_Color_Color_Id` ASC, `Species_Offspring_Quantity_Offspring_Quantity_Id` ASC),
  CONSTRAINT `fk_Image_User`
    FOREIGN KEY (`User_Id`)
    REFERENCES `BirdDatabase`.`User_Table` (`User_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Image_Species1`
    FOREIGN KEY (`Species_Species_Id` , `Species_Gender_Gender_Id` , `Species_Gender_Family_Family_Id` , `Species_Gender_Family_Order_Order_Id` , `Species_Gender_Family_Order_Sub_Order_Sub_Order_Id` , `Species_Gender_Family_Order_Sub_Order_Class_Class_Id` , `Species_Size_Size_Id` , `Species_Habitat_Habitat_Id` , `Species_Beak_Type_Beak_Type_Id` , `Species_Color_Color_Id` , `Species_Offspring_Quantity_Offspring_Quantity_Id`)
    REFERENCES `BirdDatabase`.`Species` (`Species_Id` , `FK_Gender_Id` , `FK_Family_Id` , `FK_Order_Id` , `FK_Sub_Order_Id` , `FK_Class_Id` , `FK_Size_Id` , `FK_Habitat_Id` , `FK_Beak_Type_Id` , `FK_Color_Id` , `FK_Offspring_Quantity_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'DBadmin' IDENTIFIED BY 'dbadmin';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
