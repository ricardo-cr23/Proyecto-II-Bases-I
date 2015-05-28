 <?php 
 // Created by Miuyin 5/24/2015  
 //PHP that inserts a new specie to the database  
 
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}   
		session_start();  
		
		$specie =  $_POST['specie_combo'];  
		$observation = $_POST['Observations'];
		$username = $_SESSION['id']; 

		
			$sqlVariableUser = 'SELECT insert_found_specie(?, ?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('sis', $specie, $username, $observation);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}

?> 		


