-- Package for species search
-- By Ricardo Leon

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_my_species`(
	p_User_ID INT(11)
)
BEGIN
	SELECT `Species_ID`, `Species_Name`, `Gender_Name`, `Family_Name`, `Order_Name`, `Sub_Order_Name`, `Class_Name`, `Size_Name`, `Habitat_Name`, `Beak_Name`, `Color_Name`, `Quantity`
	FROM `Species`,`Gender`, `Family`, `Order`, `Sub_Order`, `Class`, `Size`, `Habitat`, `Beak_Type`, `Color`, `Offspring_Quantity`
	WHERE `p_User_ID` = `species`.`FK_User_Id`
	AND `Species`.`FK_Gender_ID` = `Gender`.`Gender_ID`
        AND `Species`.`FK_Family_ID` = `Family`.`Family_ID`
        AND `Species`.`FK_Order_ID` = `Order`.`Order_ID`
        AND `Species`.`FK_Sub_Order_ID` = `Sub_Order`.`Sub_Order_ID`
        AND `Species`.`FK_Class_ID` = `Class`.`Class_ID`
        AND `Species`.`FK_Size_ID` = `Size`.`Size_ID`
        AND `Species`.`FK_Habitat_ID` = `Habitat`.`Habitat_ID`
        AND `Species`.`FK_Beak_Type_ID` = `Beak_Type`.`Beak_Type_ID`
        AND `Species`.`FK_Color_ID` = `Color`.`Color_ID`
        AND `Species`.`FK_Offspring_Quantity_ID` = `Offspring_Quantity`.`Offspring_Quantity_ID`
	;
END

/*Si modifican algo me avisan, para yo implementar el resto de busquedas n.n */
