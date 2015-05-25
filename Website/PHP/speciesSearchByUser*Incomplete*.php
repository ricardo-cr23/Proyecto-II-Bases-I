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
	
	$sqlVariableGetUsers = 'CALL find_my_species(?)';

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
	$stmt->bind_param('si', $searchParameter);
	
	 $stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 
	 while ($row = $result->fetch_assoc()){
	 		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
				<div class="properties">
					<form action="species-detail-by-user" method="POST">
						<h4>'.$row['Species_Name'].' </h4>
						<h5>'.$row['Gender_Name'].'</h5>
						<h5>'.$row['Family_Name'].'</h5>
						<h5>'.$row['Order_Name'].'</h5>
						<h5>'.$row['Sub_Order_Name'].'</h5>
						<h5>'.$row['Class_Name'].'</h5>
						<h5>'.$row['Size_Name'].'</h5>
						<h5>'.$row['Habitat_Name'].'</h5>
						<h5>'.$row['Beak_Name'].'</h5>
						<h5>'.$row['Color_Name'].'</h5>
						<h5>'.$row['Quantity_Name'].'</h5>
						<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$row['Species_ID'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="species" value="'.$row['Species_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="gender" value="'.$row['Gender_Name'].'"/>
						<input class="form-control" type="text" style="display: none"  readonly name="family" value="'.$row['Family_Name'].'"/>
						<input class="form-control" type="text" style="display: none"  readonly name="order" value="'.$row['Order_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="sub_order" value="'.$row['Sub_Order_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="class" value="'.$row['Class_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="size" value="'.$row['Size_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="habitat" value="'.$row['Habitat_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="beak_type" value="'.$row['Beak_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="color" value="'.$row['Color_Name'].'"/>
						<input class="form-control" type="text" style="display: none" readonly name="offspring_quantity" value="'.$row['Quantity'].'"/>
						<input type="submit" class="btn btn-primary" value="View Details"/>
					</form>
				</div>
			</div>';
	 	}
	 	echo $finalResult;
	 	$dbconnection->close();
?>
