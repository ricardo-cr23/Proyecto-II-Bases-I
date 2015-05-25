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
   
        
        <!-- Size  --> 
		<div class="Size" id = "Size">
        <select name="size_combo" style="width: 400px"  id = "size_combo" class="form-control">
		<option value = "-1">Select Breed:</option> 
		<?php  
		
				$sql = "SELECT Size_Name FROM Size";
				$result = $conn->query($sql);
				    while($row = $result->fetch_assoc()) {  
					     echo '<option>' . $row['Size_Name'] . '</option>';
					}
		?>  
		</select>   
		</div>
        <!-- Size -->

        <!-- Habitat -->
        <select name="Habitat_combo" style="width: 400px"  id = "Habitat_combo" class="form-control">
		<option value = "-1">Select Habitat:</option> 
		<?php  
		
				$sql = "SELECT Habitat_Name FROM Habitat";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Habitat_Name'] . '</option>';
				}
		?>   
		</select> 
        <!-- Habitat -->

        <!--Beak -->
        <select name="Beak_combo" style="width: 400px"  id = "Beak_combo" class="form-control">
		<option value = "-1">Select Beak Type:</option> 
		<?php  
		
				$sql = "SELECT Beak_Name FROM Beak_Type";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Beak_Name'] . '</option>';
				}
		?>   
		</select>	
        <!-- Beak-->
		
      </div>  

      <div class="col-lg-6">   
	  
	  <!-- Color  --> 
        <select name="Color_combo" style="width: 400px"  id = "Color_combo" class="form-control">
		<option value = "-1">Select Color:</option> 
		<?php  
		
				$sql = "SELECT Color_Name FROM Color";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Color_Name'] . '</option>';
				}
		?>   
		</select> 
		<!-- Color -->  
		
		<!-- Quantity -->
		<select  name="offSpring_combo" style="width: 400px"  id = "offSpring_combo" class="form-control" >
		<option value = "-1">Select Offspring Quantity:</option>
		<?php  
		
				$sql = "SELECT Quantity FROM offspring_quantity";
				$result = $conn->query($sql);
					 while($row = $result->fetch_assoc()) {  
						 echo '<option>' . $row['Quantity'] . '</option>';
				}
		?> 
		</select>
		<!-- Quantity -->  
		
		<label>Please enter a URL with a photo of your found specie:</label>
        <input type="URL" class="form-control" name="photo" title="Photo" /> <!-- -should be required -->

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

