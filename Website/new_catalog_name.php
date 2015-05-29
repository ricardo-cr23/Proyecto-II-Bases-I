
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




?>  

