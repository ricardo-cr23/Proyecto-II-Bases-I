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
-- Table `BirdDatabase`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`User` (
  `User_Id` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NOT NULL,
  `First Name` VARCHAR(45) NULL,
  `Last Name` VARCHAR(45) NULL,
  `Phone` VARCHAR(45) NULL,
  PRIMARY KEY (`User_Id`),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Animal` (
  `Animal_Id` INT NOT NULL AUTO_INCREMENT,
  `Animal_Name` VARCHAR(45) NOT NULL,
  `User_Id` INT NOT NULL,
  PRIMARY KEY (`Animal_Id`, `User_Id`),
  UNIQUE INDEX `Name_UNIQUE` (`Animal_Name` ASC),
  INDEX `fk_Animal_User_idx` (`User_Id` ASC),
  CONSTRAINT `fk_Animal_User1`
    FOREIGN KEY (`User_Id`)
    REFERENCES `BirdDatabase`.`User` (`User_Id`)
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
  PRIMARY KEY (`Image_Id`, `User_Id`, `Animal_Id`),
  INDEX `fk_Image_User_idx` (`User_Id` ASC),
  INDEX `fk_Image_Animal_idx` (`Animal_Id` ASC),
  CONSTRAINT `fk_Image_User`
    FOREIGN KEY (`User_Id`)
    REFERENCES `BirdDatabase`.`User` (`User_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Image_Animal1`
    FOREIGN KEY (`Animal_Id`)
    REFERENCES `BirdDatabase`.`Animal` (`Animal_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Species`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Species` (
  `Species_Id` INT NOT NULL AUTO_INCREMENT,
  `Species_Name` VARCHAR(45) NOT NULL,
  `Animal_Id` INT NOT NULL,
  PRIMARY KEY (`Species_Id`, `Animal_Id`),
  INDEX `fk_Species_Animal_idx` (`Animal_Id` ASC),
  CONSTRAINT `fk_Species_Animal1`
    FOREIGN KEY (`Animal_Id`)
    REFERENCES `BirdDatabase`.`Animal` (`Animal_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Gender` (
  `Gender_Id` INT NOT NULL AUTO_INCREMENT,
  `Gender_Name` VARCHAR(45) NOT NULL,
  `Species_Id` INT NOT NULL,
  PRIMARY KEY (`Gender_Id`, `Species_Id`),
  INDEX `fk_Gender_Species1_idx` (`Species_Id` ASC),
  CONSTRAINT `fk_Gender_Species1`
    FOREIGN KEY (`Species_Id`)
    REFERENCES `BirdDatabase`.`Species` (`Species_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Family`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Family` (
  `Family_Id` INT NOT NULL AUTO_INCREMENT,
  `Family_Name` VARCHAR(45) NOT NULL,
  `Gender_Id` INT NOT NULL,
  PRIMARY KEY (`Family_Id`, `Gender_Id`),
  INDEX `fk_Family_Gender_idx` (`Gender_Id` ASC),
  CONSTRAINT `fk_Family_Gender1`
    FOREIGN KEY (`Gender_Id`)
    REFERENCES `BirdDatabase`.`Gender` (`Gender_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Order` (
  `Order_Id` INT NOT NULL AUTO_INCREMENT,
  `Order_Name` VARCHAR(45) NOT NULL,
  `Family_Id` INT NOT NULL,
  PRIMARY KEY (`Order_Id`, `Family_Id`),
  INDEX `fk_Order_Family_idx` (`Family_Id` ASC),
  CONSTRAINT `fk_Order_Family1`
    FOREIGN KEY (`Family_Id`)
    REFERENCES `BirdDatabase`.`Family` (`Family_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Sub_Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Sub_Order` (
  `Sub_Order_Id` INT NOT NULL AUTO_INCREMENT,
  `Sub_Order_Name` VARCHAR(45) NOT NULL,
  `Order_Id` INT NOT NULL,
  PRIMARY KEY (`Sub_Order_Id`, `Order_Id`),
  INDEX `fk_Sub_Order_Order_idx` (`Order_Id` ASC),
  CONSTRAINT `fk_Sub_Order_Order1`
    FOREIGN KEY (`Order_Id`)
    REFERENCES `BirdDatabase`.`Order` (`Order_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Class` (
  `Class_Id` INT NOT NULL AUTO_INCREMENT,
  `Class_Name` VARCHAR(45) NOT NULL,
  `Sub_Order_Id` INT NOT NULL,
  PRIMARY KEY (`Class_Id`, `Sub_Order_Id`),
  UNIQUE INDEX `Class_Name_UNIQUE` (`Class_Name` ASC),
  INDEX `fk_Class_Sub_Order_idx` (`Sub_Order_Id` ASC),
  CONSTRAINT `fk_Class_Sub_Order1`
    FOREIGN KEY (`Sub_Order_Id`)
    REFERENCES `BirdDatabase`.`Sub_Order` (`Sub_Order_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Color` (
  `Color_Id` INT NOT NULL AUTO_INCREMENT,
  `Color_Name` VARCHAR(45) NOT NULL,
  `Class_Id` INT NOT NULL,
  PRIMARY KEY (`Color_Id`, `Class_Id`),
  UNIQUE INDEX `Color_Name_UNIQUE` (`Color_Name` ASC),
  INDEX `fk_Color_Class_idx` (`Class_Id` ASC),
  CONSTRAINT `fk_Color_Class1`
    FOREIGN KEY (`Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Habitat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Habitat` (
  `Habitat_Id` INT NOT NULL AUTO_INCREMENT,
  `Habitat_Name` VARCHAR(45) NOT NULL,
  `Class_Id` INT NOT NULL,
  PRIMARY KEY (`Habitat_Id`, `Class_Id`),
  UNIQUE INDEX `Habitat_Name_UNIQUE` (`Habitat_Name` ASC),
  INDEX `fk_Habitat_Class_idx` (`Class_Id` ASC),
  CONSTRAINT `fk_Habitat_Class1`
    FOREIGN KEY (`Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Offspring_Quantity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Offspring_Quantity` (
  `Offspring_Quantity_Id` INT NOT NULL AUTO_INCREMENT,
  `Quantity` INT NOT NULL,
  `Class_Id` INT NOT NULL,
  PRIMARY KEY (`Offspring_Quantity_Id`, `Class_Id`),
  INDEX `fk_Offspring_Quantity_Class1_idx` (`Class_Id` ASC),
  CONSTRAINT `fk_Offspring_Quantity_Class1`
    FOREIGN KEY (`Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Beak_Type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Beak_Type` (
  `Beak_Type_Id` INT NOT NULL AUTO_INCREMENT,
  `Beak_Name` VARCHAR(45) NOT NULL,
  `Class_Id` INT NOT NULL,
  PRIMARY KEY (`Beak_Type_Id`, `Class_Id`),
  UNIQUE INDEX `Beak_Name_UNIQUE` (`Beak_Name` ASC),
  INDEX `fk_Beak_Type_Class_idx` (`Class_Id` ASC),
  CONSTRAINT `fk_Beak_Type_Class1`
    FOREIGN KEY (`Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BirdDatabase`.`Size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BirdDatabase`.`Size` (
  `Size_Id` INT NOT NULL AUTO_INCREMENT,
  `Size_Name` VARCHAR(45) NOT NULL,
  `Class_Id` INT NOT NULL,
  PRIMARY KEY (`Size_Id`, `Class_Id`),
  UNIQUE INDEX `Size_Name_UNIQUE` (`Size_Name` ASC),
  INDEX `fk_Size_Class_idx` (`Class_Id` ASC),
  CONSTRAINT `fk_Size_Class1`
    FOREIGN KEY (`Class_Id`)
    REFERENCES `BirdDatabase`.`Class` (`Class_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'DBadmin' IDENTIFIED BY 'dbadmin';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
