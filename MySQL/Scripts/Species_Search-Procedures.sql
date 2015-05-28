-- Package for species search
-- By Ricardo Leon and modified by Miuyin


CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_my_species`(
        p_User_ID INT(11)
)
BEGIN
        SELECT Species_Id, Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class
        WHERE FK_User_Id = p_User_ID
        AND specie.Specie_Id = species_found.FK_Specie_Id 
        AND specie.FK_Size_Id = Size.Size_Id 
        AND specie.FK_Color_Id = Color.Color_Id 
        AND specie.FK_Habitat_Id = habitat.Habitat_Id
        AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id  
        AND specie.FK_Gender_Id = Gender.Gender_Id  
        AND Gender.FK_Family_Id = Family.Family_Id 
        AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
        AND sub_order.FK_Order_Id = Orders.Order_Id 
        AND Orders.FK_Class_Id = Class.Class_Id;
END 

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_all_species`(
)
BEGIN
        SELECT Species_Id, Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class
        WHERE specie.Specie_Id = species_found.FK_Specie_Id 
        AND specie.FK_Size_Id = Size.Size_Id 
        AND specie.FK_Color_Id = Color.Color_Id 
        AND specie.FK_Habitat_Id = habitat.Habitat_Id
        AND specie.FK_Offspring_Quantity_Id = offspring_quantity.Offspring_Quantity_Id  
        AND specie.FK_Gender_Id = Gender.Gender_Id  
        AND Gender.FK_Family_Id = Family.Family_Id 
        AND Family.FK_Sub_Order_Id = sub_order.Sub_Order_Id 
        AND sub_order.FK_Order_Id = Orders.Order_Id 
        AND Orders.FK_Class_Id = Class.Class_Id; 
END
