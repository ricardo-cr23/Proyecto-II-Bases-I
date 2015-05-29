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

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_species_detail`(
        p_Species_ID INT(11)
)
BEGIN
        SELECT Species_Id, Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description, Register_Date, Username, First_Name, Last_Name
        FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class, user_table
        WHERE Specie_ID = p_Species_ID
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

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_bird`(
        p_Specie_Name VARCHAR(45),
        p_Size_Name VARCHAR(45),
        p_Habitat_Name VARCHAR(45),
        p_Beak_Name VARCHAR(45),
        p_Color_Name VARCHAR(45),
        p_Quantity VARCHAR(45),
        p_Gender_Name VARCHAR(45),
        p_Family_Name VARCHAR(45),
        p_Sub_Order_Name VARCHAR(45),
        p_Order_Name VARCHAR(45),
        p_Class_Name VARCHAR(45)
)
BEGIN
	SELECT Species_Id, Specie_Name, Size_Name, Habitat_Name, Beak_Name, Color_Name, Quantity, Gender_Name, Family_Name, Sub_Order_Name, Order_Name, Class_Name, Description
	FROM species_found, specie, Size, Habitat, Beak_Type, Color, offspring_quantity, Gender, Family, Sub_Order, Orders, Class
        WHERE p_Specie_Name = Specie_Name
        OR p_Size_Name = Size_Name
        OR p_Habitat_Name = Habitat_Name
        OR p_Beak_Name = Beak_Name
        OR p_Color_Name = Color_Name
        OR p_Quantity = Quantity
        OR p_Gender_Name = Gender_Name
        OR p_Family_Name = Family_Name
        OR p_Sub_Order_Name = Sub_Order_Name
        OR p_Order_Name = Order_Name
        OR p_Class_Name = Class_Name
END
