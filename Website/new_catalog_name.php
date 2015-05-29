
<?php   
$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); 
	echo "-1"; 
	return false; 
}  

			$CategorySelected = $_GET['selectedOption'];  
			
			
		        if ($CategorySelected == "Order"){  
					$sql = "SELECT Class_Name FROM Class";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Class" id = "Other" class="form-control">';
						 echo '<option value = "-1">Select Class:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Class_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					}
				}    
				
				    if ($CategorySelected == "Sub-Order"){  
					$sql = "SELECT Order_Name FROM Orders";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Order" id = "Other" class="form-control">';
						 echo '<option value = "-1">Select Order:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Order_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					}
				}   
				
					if ($CategorySelected == "Family"){  
					$sql = "SELECT Sub_Order_Name FROM Sub_Order";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Sub_Order" id = "Other" class="form-control">';
						 echo '<option value = "-1">Select Sub_Order:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Sub_Order_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					}
				} 

					if ($CategorySelected == "Genera"){  
					$sql = "SELECT Family_Name FROM Family";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Family" id = "Other" class="form-control">';
						 echo '<option value = "-1">Select Family:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Family_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					}
				}  

					if ($CategorySelected == "Species"){  
					$sql = "SELECT Gender_Name FROM Gender";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						 echo '<select name="Gender" id = "Other" class="form-control">';
						 echo '<option value = "-1">Select Gender:</option>';
						 
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Gender_Name'] . '</option>';
						 } 
						 echo '</select>'; 
					} else {
						 echo "0 results";
					} 
					
					$sql1 = "SELECT Size_Name FROM Size";
					$result1 = $conn->query($sql1); 
					echo '<select name="Size" id = "Other" class="form-control">'; 
					echo '<option value = "-1">Select Size:</option>';
				    while($row = $result1->fetch_assoc()) {  
					     echo '<option>' . $row['Size_Name'] . '</option>';
					} 
					echo '</select>'; 
					
					echo '<select name="Habitat" id = "Other" class="form-control">'; 
					echo '<option value = "-1">Select Habitat:</option>';
					$sql2 = "SELECT Habitat_Name FROM Habitat";
					$result2 = $conn->query($sql2);
					 while($row = $result2->fetch_assoc()) {  
						 echo '<option>' . $row['Habitat_Name'] . '</option>';
					} 
					echo '</select>';  
					
					echo '<select name="Beak" id = "Other" class="form-control">'; 
					echo '<option value = "-1">Select Beak Type:</option>';
					$sql = "SELECT Beak_Name FROM Beak_Type";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Beak_Name'] . '</option>';
					} 
					echo '</select>';   
					
					echo '<select name="Color" id = "Other" class="form-control">'; 
					echo '<option value = "-1">Select Color:</option>';
					$sql = "SELECT Color_Name FROM Color";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Color_Name'] . '</option>';
					} 
					echo '</select>';  
					
					echo '<select name="Offspring" id = "Other" class="form-control">'; 
					echo '<option value = "-1">Select Offspring Quantity:</option>';
					$sql = "SELECT Quantity FROM offspring_quantity";
					$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Quantity'] . '</option>';
					}
					echo '</select>';    
					echo '<input id="new_name" type="text" class="form-control" name = "new_name" placeholder="Enter scientific name" required >';
					
					
				} 	


?>  

