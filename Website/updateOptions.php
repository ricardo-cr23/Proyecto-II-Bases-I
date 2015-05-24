

 <?php 
 //  PHP that changes the radio button options in the manage categories.php according to what the users select in the combobox  
 // This PHP is called by manage-categories on the javascript ajax function update();   
 
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}  

 
		//parameter received by ajax in the function update in manage-categories.php 
		
		$Selected = $_GET['selectedOption'];  
		echo " $Selected <br />" ;
		
		if($Selected == "Class"){  	 
		$sql = "SELECT * FROM Class";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Class_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Class_Id']}'  value = '{$row['Class_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
        } 
		
		else if ($Selected == "Order"){ 
		$sql = "SELECT Order_Id, Order_Name FROM Orders";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Order_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Order_Id']}'  value = '{$row['Order_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
		}  
		
		else if ($Selected == "Sub-Order"){ 
		$sql = "SELECT Sub_Order_Id, Sub_Order_Name FROM Sub_Order";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Sub_Order_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Sub_Order_Id']}'  value = '{$row['Sub_Order_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
		}  
		
		else if ($Selected == "Family"){ 
		$sql = "SELECT Family_Id, Family_Name FROM Family";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Family_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Family_Id']}'  value = '{$row['Family_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
		} 
		
		else if ($Selected == "Genera"){ 
		$sql = "SELECT Gender_Id, Gender_Name FROM Gender";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Gender_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Gender_Id']}'  value = '{$row['Gender_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
		}
		
		else if ($Selected == "Species"){ 
		$sql = "SELECT Specie_Id, Specie_Name FROM specie";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Specie_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Specie_Id']}'  value = '{$row['Specie_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					}
		} 
		
		else if ($Selected == "Color"){  
		$sql = "SELECT * FROM Color";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Color_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Color_Id']}'  value = '{$row['Color_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 
		
		else if ($Selected == "Color"){  
		$sql = "SELECT * FROM Color";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Color_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Color_Id']}'  value = '{$row['Color_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 
		
		else if ($Selected == "Habitat"){  
		$sql = "SELECT * FROM Habitat";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Habitat_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Habitat_Id']}'  value = '{$row['Habitat_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 
		
		else if ($Selected == "Habitat"){  
		$sql = "SELECT * FROM Habitat";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Habitat_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Habitat_Id']}'  value = '{$row['Habitat_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 
		
		else if ($Selected == "Offspring Quantity"){  
		$sql = "SELECT * FROM Offspring_Quantity";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Quantity']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Offspring_Quantity_Id']}'  value = '{$row['Quantity']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		}
		
		else if ($Selected == "Beak Type"){  
		$sql = "SELECT * FROM Beak_Type";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Beak_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Beak_Type_Id']}'  value = '{$row['Beak_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 

		else if ($Selected == "Size"){  
		$sql = "SELECT * FROM Size";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<label>{$row['Size_Name']}</label><input  type = 'radio'  name = 'radio' id = '{$row['Size_Id']}'  value = '{$row['Size_Name']}'/><br /> "  ; 	
						 }
					} else {
						 echo "0 results";
					} 
		} 
		

        ?>		
		

	
