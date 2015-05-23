<?php
	include "DatabaseConnection.php";
	
	$dbconnection = new DatabaseConnection('localhost','DBadmin','dbadmin','BirdDatabase');
	$dbconnection->connectToDatabase();
	
	if($dbconnection->getConnection() != false){
		echo "Connection Established";
	}
?>