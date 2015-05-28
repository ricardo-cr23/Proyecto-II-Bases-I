<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / My Species</span>
    <h2>My Species</h2> 
  </div>
</div>
<!-- banner -->  

		<?php  
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}  
		
		session_start();  
		$searchData = $_SESSION['id'];
		$finalResult = '';		

			
		?> 
		


<div class="container">
      <div class="col-lg-9 col-sm-8">
       
		
				<?php
			
	$sqlVariableGetMySpecies = 'CALL find_my_species(?)'; 
	$stmt = $conn->prepare($sqlVariableGetMySpecies);
	$stmt->bind_param('i', $searchData); 
	
	$stmt->execute();
	 $result = $stmt->get_result(); 
	 if($result->num_rows == null){
	 	$finalResult = "<h2>No results found<h2>";	
	 }
	 while ($row = $result->fetch_assoc()){
	 		$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6">
												<div class="properties">
													<form action="user-detail.php" method="POST">
														<h4>'.$row['Specie_Name'].' </h4>
														<h5>'.$row['Size_Name'].'</h5>
														<h5>'.$row['Habitat_Name'].'</h5>
														<input class="form-control" type="text" style="display: none" readonly name="beak_name" value="'.$row['Beak_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="color" value="'.$row['Color_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="family" value="'.$row['Family_Name'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="suborder" value="'.$row['Sub_Order_Name'].'"/>
														<input class="form-control" type="text" style="display: none"  readonly name="order" value="'.$row['Order_Name'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="class" value="'.$row['Class_Name'].'"/>
														<input type="submit" class="btn btn-primary" value="View Details"/>
													</form>
												</div>
										   </div>';
	 	}
	 	echo $finalResult;
	 	$conn->close();

		?>
     
      </div>
    </div>
<?php include'footer.php';?>