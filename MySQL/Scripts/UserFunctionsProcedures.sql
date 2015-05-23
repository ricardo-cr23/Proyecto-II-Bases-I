CREATE DEFINER=`DBadmin`@`localhost` FUNCTION `user_insert_user_data`(
	 p_username VARCHAR(45),
     p_password VARCHAR(45),
     p_name VARCHAR(45),
     p_last_name VARCHAR(45),
     p_email VARCHAR(45),
     p_usertype INT
) RETURNS int(11)
BEGIN
	DECLARE 
		user_count INT;
	SELECT COUNT(p_username) INTO user_count FROM User_Table
    WHERE p_username = User_Table.username;
    
    IF user_count >= 1 THEN
		RETURN -1;
	ELSEIF user_count = 0 THEN
		INSERT INTO user_table(Username,User_Password,First_Name,Last_Name,Email,User_Type)
        VALUES (p_username,p_password,p_name,p_last_name,p_email,p_usertype);
        RETURN 1;
	END IF;
END

/*----------------------------------------------------------*/
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `find_users`(
	p_username VARCHAR(45),
	p_search_type INT
)
BEGIN
	IF p_search_type = 0 THEN
		SELECT User_Id, Username, Email, First_Name, Last_Name, Admin, User_Type 
        FROM user_table;
	ELSE 
		SELECT User_Id, Username, Email, First_Name, Last_Name, User_Type 
        FROM User_Table 
        WHERE Username 
        LIKE CONCAT(p_username,"%");
	END IF;
END

/*-------------------------------------------------------------*/
CREATE DEFINER=`DBadmin`@`localhost` PROCEDURE `user_login_process`(
	p_username VARCHAR(45)
)
BEGIN
	SELECT user_id, username, user_password, first_name, last_name, email, user_type, admin 
    FROM user_table 
    WHERE username = p_username;
END