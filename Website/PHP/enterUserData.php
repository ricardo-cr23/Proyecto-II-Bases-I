<?php

	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$finalArray = file_get_contents('php://input');									
	$finalArray = json_decode($finalArray,true);
	$username = $finalArray['finalArray'][0];             
	$password = $finalArray['finalArray'][1];
	$name = $finalArray['finalArray'][3];
	$lastName = $finalArray['finalArray'][4];
	$email = $finalArray['finalArray'][5];
	$userType = $finalArray['finalArray'][6];
	$result;
	
	if ($dbconnection->connect_error) {
	    die("Connection failed: " . $dbconnection->connect_error);
	    echo "-1";
	    return false;
	} 
	
	$password = md5($password);
	
	$sqlVariableUser = 'SELECT user_insert_user_data(?,?,?,?,?,?);';
	if(!$stmt = $dbconnection->prepare($sqlVariableUser)){
		exit($dbconnection->error);
		return false;
	} else {
		$stmt->bind_param('ssssss', $username,$password,$name,$lastName,$email,$userType);
		$stmt->execute();
		$result= $stmt->get_result()->fetch_row()[0];
		echo ($result);
	}
	
	$dbconnection->close();
?>