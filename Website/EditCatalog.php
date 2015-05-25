<?php  
 // Created by Miuyin 5/24/2015  
 //PHP that edits catalog 
 
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}  
	    $var1 = $_GET['selectedOption']; 
		$selectedId = (int)$_GET['selectedId'];     
		$newName = $_GET['newName'];  
		
			if($var1 == "Class"){   
			$sqlVariableUser = 'SELECT update_class(?,?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
        
		
		else if ($var1 == "Order"){     
			 $sqlVariableUser = 'SELECT update_order(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		  
		
		else if ($var1 == "Sub-Order"){ 
			 $sqlVariableUser = 'SELECT update_suborder(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Family"){ 
			 $sqlVariableUser = 'SELECT update_family(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Genera"){ 
			 $sqlVariableUser = 'SELECT update_gender(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Species"){ 
			 $sqlVariableUser = 'SELECT update_species(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Color"){ 
			$sqlVariableUser = 'SELECT update_color(?,?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Habitat"){ 
		    $sqlVariableUser = 'SELECT update_habitat(?,?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		
		else if ($var1 == "Offspring Quantity"){  
			$sqlVariableUser = 'SELECT update_update_offspringQuantitty(?,?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
		else if ($var1 == "Beak Type"){  
			$sqlVariableUser = 'SELECT update_beak_type(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		 
		
		else if ($var1 == "Size"){  
			$sqlVariableUser = 'SELECT update_size(?, ?);';
			if(!$stmt = $conn->prepare($sqlVariableUser)){
				exit($conn->error);
				return false;
			} else {
				$stmt->bind_param('si', $newName, $selectedId);
				$stmt->execute();
				$result= $stmt->get_result()->fetch_row()[0];
				echo ($result);
			}
		} 
		
?>
  
