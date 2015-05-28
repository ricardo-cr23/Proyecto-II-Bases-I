<?php include'header.php';?>  
<!--  Created by Miuyin 5/24/2015   -->

<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register Found Specie</span>
    <h2>Register Found Specie</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		
	  <form enctype="multipart/form-data" action="REGISTER_FOUND_SPECIE.php" method="POST" class="register-specie-form" id="register-specie-form">
	   <!-- specie--> 
	   <H4>Select Specie:</H4>
		<select name="specie_combo" style="width: 400px"   id = "specie_combo" class="form-control"> 
		<option value = "-1">Select Specie:</option> 
		<?php  
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}  
					$sql = "SELECT Specie_Name FROM Specie";
					$result = $conn->query($sql);
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Specie_Name'] . '</option>';
					}
		?>  
		</select>  
		 <!-- specie -->
  
		
		<label>Please enter a URL with a photo of your found specie:</label>
        <input type="URL" class="form-control" name="photo" title="Photo" /> <!-- -should be required --> 
		
		<label>Observations:</label>
		<input type="Observations" class="form-control" name="Observations" title="Observations" /> 

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input type="submit" value="Register"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 

<?php include'footer.php';?>  
	</form>

