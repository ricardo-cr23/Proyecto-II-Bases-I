  <?php 
 // This php connects to the dadabatse and inserts new options on the tables that only an admin can modify  
 // These are options are used when a user wants to register a pet. These options are shown in the comboboxes or register-pet.php
 
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}  
		// Takes the values selected value in the combobox (a select named 'category' in manage-categories.php) 
		// Also takes in the new name written by the user that wants to be inserted (from an input named 'new name'.php) 
		
		$var1 = $_GET['selectedOption'];  
		$var2 = $_GET['newNameText']; 
		$var3 = $_GET['selectedType']; 
			
		echo $var1;
  
		
		if($var1 == "Class"){   
			$sqlVariableUser = 'SELECT insert_class(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
        
		
		else if ($var1 == "Order"){     
			 $sqlVariableUser = 'SELECT insert_order(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ss', $var2, $var3);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		  
		
		else if ($var1 == "Sub-Order"){ 
			 $sqlVariableUser = 'SELECT insert_suborder(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ss', $var2, $var3);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Family"){ 
			 $sqlVariableUser = 'SELECT insert_family(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ss', $var2, $var3);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		}
		
		else if ($var1 == "Genera"){ 
			 $sqlVariableUser = 'SELECT insert_gender(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ss', $var2, $var3);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		}
		
		else if ($var1 == "Species"){ 
			 $sqlVariableUser = 'SELECT insert_species(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('ss', $var2, $var3);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		}
		
		else if ($var1 == "Color"){ 
			$sqlVariableUser = 'SELECT insert_color(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Habitat"){ 
		    $sqlVariableUser = 'SELECT insert_habitat(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		
		else if ($var1 == "Offspring Quantity"){  
			$sqlVariableUser = 'SELECT insert_offspring_quantity(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		
		else if ($var1 == "Beak Type"){  
			$sqlVariableUser = 'SELECT insert_Beak_Type(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		 
		
		else if ($var1 == "Size"){  
			$sqlVariableUser = 'SELECT insert_size(?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('s', $var2);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		}  
	
		
        ?> 
		

	
