<?php
	
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$userDetails = file_get_contents('php://input');
	$userDetails = json_decode($userDetails, true);
	$username = $userDetails['dataToSend'][0];
	$password = $userDetails['dataToSend'][1];
	$result;
	$row;
	
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}
	$password = md5($password);
	
	$sqlVariableLogin = 'CALL user_login_process(?)';
	
	$stmt = $dbconnection->prepare($sqlVariableLogin);
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if($result == false){
		exit('0');
	}
	
	$row = $result->fetch_row();
	
	
	if($row[2] == $password){
		if($row[6]  == 1){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $row[0];
 			$_SESSION['usertype'] = $row[7];
			exit('2');
		} else {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $row[0];
			$_SESSION['first_name'] = $row[3];
			$_SESSION['last_name'] = $row[4];
			$_SESSION['email'] = $row[5];
			$_SESSION['expert'] = $row[6];
			$_SESSION['usertype'] = $row[7];
			exit('1');
		}
	}
	
	$dbconnection->close();

?>