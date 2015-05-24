<?php
	
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$json = file_get_contents('php://input');
	$json = json_decode($json,true);
	$imageFile = $json['imageData'][0]; 
	$imageName = $json['imageData'][1];
	$imageLocation = $json['imageData'][2];
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}
	
?>