<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register Pet</span>
    <h2>Register Pet</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		
	  <form enctype="multipart/form-data" action="REGISTER_PET.php" method="POST" class="register-pet-form" id="register-pet-form">
	   <!-- specie--> 
		<select name="specie_combo" style="width: 400px"  onchange = "updateBreed();" id = "specie_combo" class="form-control">
		<option value = "-1">Select Specie:</option> 
		<?php  
		$conn = new mysqli('localhost','DBadmin','dbadmin','BirdDatabase');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error); 
			echo "-1"; 
			return false; 
		}  
					$sql = "SELECT Class_Name FROM Class";
					$result = $conn->query($sql);
						 while($row = $result->fetch_assoc()) {  
							 echo '<option>' . $row['Class_Name'] . '</option>';
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
        <select name="Habitat" style="width: 400px"  id = "Habitat" class="form-control">
		<option value = "-1">Select Color:</option> 
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
        <select name="Beak" style="width: 400px"  id = "Beak" class="form-control">
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
        <select name="Color" style="width: 400px"  id = "Color" class="form-control">
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
		<select  name="offSpring" style="width: 400px"class="form-control" >
		<option value = "-1">Select Offspring Quantity:</option>
		<?php  
		
			$query= 'select quantity from offspring_quantity';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['Quantity'] . '</option>';
				}
		?>   
		</select>
		<!-- Quantity -->  
		
		<label>Please enter a URL with a photo of your pet:</label>
        <input type="URL" class="form-control" name="photo" title="Photo" required/>

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input type="submit" value="Register Specie"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 

<?php include'footer.php';?>  
	</form>

<script type="text/javascript"> 

function updateBreed(){
		var xmlhttp;
		var Id = document.getElementById( "pet_type_combo");
        var selectedOption = Id.options[Id.selectedIndex].value;    
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("breeds").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_breed_combo.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
} 

function registerPet(){  
		var xmlhttp;
		var Id = document.getElementById( "pet_type_combo");
        var selectedOption = Id.options[Id.selectedIndex].value;    
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("breeds").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_breed_combo.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
		alert(selectedOption);

}

  </script> 