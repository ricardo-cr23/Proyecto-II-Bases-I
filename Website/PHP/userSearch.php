<?php
	
	session_start();
	$dbconnection = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');
	$data = file_get_contents('php://input');
	$data = json_decode($data,true);
	$searchParameter = $data[0];
	$searchType;
	$stmt;
	$result;
	$resultSet;
	$row;
	$finalResult = '';
	
	$sqlVariableGetUsers = 'CALL user_find_users(?,?)';
	
	if ($dbconnection->connect_error) {
		die("Connection failed: " . $dbconnection->connect_error);
		echo "-1";
		return false;
	}

	if($searchParameter  == ""){
		$searchType = 0;
	} else {
		$searchType = 1;
	}
	
	$stmt = $dbconnection->prepare($sqlVariableGetUsers);
	$stmt->bind_param('si', $searchParameter, $searchType);
	
	 $stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 
	 while ($row = $result->fetch_assoc()){
	 		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
												<div class="properties">
													<form action="user-detail.php" method="POST">
														<h4>'.$row['Username'].' </h4>
														<h5>'.$row['First_Name'].'</h5>
														<h5>'.$row['Last_Name'].'</h5>
														<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$row['User_Id'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$row['Username'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="email" value="'.$row['Email'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="name" value="'.$row['First_Name'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="last_name" value="'.$row['Last_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="user-type" value="'.$row['User_Type'].'"/>
														<input type="submit" class="btn btn-primary" value="View Details"/>
													</form>
												</div>
										   </div>';
	 	}
	 	echo $finalResult;
	 	$dbconnection->close();
?>