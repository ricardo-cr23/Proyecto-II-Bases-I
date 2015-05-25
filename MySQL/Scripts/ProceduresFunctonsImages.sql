CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `image_insert_image`(p_user_id INT,
     p_species_id INT,
	 p_image_name VARCHAR(45),
     p_image_location VARCHAR(45),
     p_image LONGBLOB
	)
BEGIN
	INSERT INTO image(User_Id, Species_Id, Image_Name, Image_Location, Image) 
    VALUES(p_user_id, p_species_id, p_image_name, p_image_location, p_image);
END

/*------------------------------------------------------------------------------------*/

CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `image_retrieve_images`(p_id INT)
BEGIN
	SELECT User_Id, Image, Image_Name, Image_Location 
    FROM Image
    WHERE p_id = User_Id;
END