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
		$size =  $_POST['size_combo'];  
		$habitat =  $_POST['Habitat_combo'];  
		$beak = $_POST['Beak_combo'];   
		$color = $_POST['Color_combo'];   
		$offspring = $_POST['offSpring_combo']; 
		$image = $_POST['photo'];   
		$username = $_SESSION['id'];
		
		echo $specie; 
		echo $size; 
		echo $habitat; 
		echo $beak; 
		echo $color;
		echo $offspring;   
		echo $username;
		
			$sqlVariableUser = 'SELECT insert_found_specie(?, ?, ?, ?, ?, ?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ssssssi', $specie, $size, $habitat, $beak, $color, $offspring, $username);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}

?> 		


