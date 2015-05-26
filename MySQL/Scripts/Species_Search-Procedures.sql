-- Package for species search
-- By Ricardo Leon and modified by Miuyin


CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_my_species`(
        p_User_ID INT(11)
)
BEGIN
        SELECT Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class
        WHERE Fk_User_Id = p_User_ID 
        AND specie.Specie_Id = species_found.FK_Specie_Id 
        AND Size.Size_Id = species_found.FK_Size_Id
        AND Habitat.Habitat_Id = species_found.FK_Habitat_Id 
        AND Beak_Type.Beak_Type_Id = species_found.FK_Beak_Type_Id 
        AND Color.Color_Id = species_found.FK_Color_Id 
        AND offspring_quantity.Offspring_Quantity_Id = species_found.FK_Offspring_Quantity_Id 
        AND Gender.Gender_Id = species_found.FK_Specie_Id 
        AND Family.Family_Id = Gender.FK_Family_Id 
        AND Sub_Order.Sub_Order_Id = Family.FK_Sub_Order_Id 
        AND Orders.Order_Id = Sub_Order.FK_Order_Id 
        AND Class.Class_Id = Orders.FK_Class_Id; 
END 

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_all_species`(
        p_User_ID INT(11)
)
BEGIN

        SELECT Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class
        WHERE specie.Specie_Id = species_found.FK_Specie_Id 
        AND Size.Size_Id = species_found.FK_Size_Id
        AND Habitat.Habitat_Id = species_found.FK_Habitat_Id 
        AND Beak_Type.Beak_Type_Id = species_found.FK_Beak_Type_Id 
        AND Color.Color_Id = species_found.FK_Color_Id 
        AND offspring_quantity.Offspring_Quantity_Id = species_found.FK_Offspring_Quantity_Id 
        AND Gender.Gender_Id = species_found.FK_Specie_Id 
        AND Family.Family_Id = Gender.FK_Family_Id 
        AND Sub_Order.Sub_Order_Id = Family.FK_Sub_Order_Id 
        AND Orders.Order_Id = Sub_Order.FK_Order_Id 
        AND Class.Class_Id = Orders.FK_Class_Id;  
END
