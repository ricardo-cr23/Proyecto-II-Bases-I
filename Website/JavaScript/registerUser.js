/**
 * This file is used to extract inputs from the html document, these inputs are then sent to PHP to be entered into the database.
 */

window.onload = function findSubmitButton() {
    var button = document.getElementById("Submit_User").addEventListener("click", sendData); 
}

function clearInputs(Array){
	for(var i = 0; i < Array.length; i++){
		Array[i].value = '';
	}
}

function sendData(){
	  var xmlhttp;
	  var inputArray;
	  var finalArray = [];
	  var JSONArray;
	  var userId;
	  var serverResponse;
	  var phoneNumber;
	  var userType; 
	  
	  if (window.XMLHttpRequest){
		  xmlhttp = new XMLHttpRequest();        /* Used for IE7+,FireFox, Opera, Chrome, Safari */
	  } else if (window.ActiveXObject) {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");   /* Compatibility for IE6 browsers */
	  } else {
		  throw new Error("Your browser is not compatible with XMLHTTP");
		  return false;
	  }
	  
	  /* The following section validates if the required inputs have text in them and if the password fields match*/
	  inputArray = document.querySelectorAll("input[id=register]")
	  if (inputArray[1].value != inputArray[2].value){
		  alert("Password doesn't match, please make sure your password matches")
		  clearInputs(inputArray);
		  return false;
	  }
	  
	for(var i = 0; i < inputArray.length; i++){
	  if (inputArray[i].value == ""){
		  alert("Please fill out all of the fields");
		  return false;
	  }
		finalArray[i] = inputArray[i].value;
	  }
	if(document.getElementById("regular_user").checked){
		userType = document.getElementById("regular_user").value;
	} else if (document.getElementById("expert").checked) {
		userType = document.getElementById("expert").value;
	}	
	
	finalArray[6] = userType;
	JSONArray = JSON.stringify({finalArray: finalArray});
	
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				serverResponse = xmlhttp.responseText 
				var code = parseInt(serverResponse);
				console.log(serverResponse);
				if (code == 1){
					alert("Account created successfully. Press OK to be redirected");
					window.location = "index.php";
				} else {
					alert("The username you have selected already exists. Press ok to re-enter data")
					clearInputs(inputArray);
				}
		  }
	  }
	xmlhttp.open("POST","php/enterUserData.php", true);
	xmlhttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	xmlhttp.send(JSONArray);
}
