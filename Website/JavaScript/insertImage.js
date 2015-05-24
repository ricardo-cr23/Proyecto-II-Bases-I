window.addEventListener("load", function findImageUploadButton (){
	var button = document.getElementById("upload image").addEventListener("click", sendImage);
});

function clearInputs(){
	document.getElementById("image").value = "";
	document.getElementById("name").value = "";
	document.getElementById("location").value = "";
}

function sendImage(){
	var imageName;
	var imageLocation;
	var image;
	var species;
	var imageData = [];
	var encodedImage;
	var Json;
	var regex = /\.(?:jpe?g|png|gif)$/;
	var XMLHttp = new XMLHttpRequest();
	var code;
	var serverResponse;
	var reader = new FileReader();
	
	image = document.getElementById("image");
	imageFile = document.getElementById("image").files[0];
	imageName = document.getElementById("name").value;
	imageLocation = document.getElementById("location").value;
	
	if(image.value == "" || imageName == "" || imageLocation == "" || !regex.test(image.value)){
		alert("You must upload a .gif, .jpg or .png file and you must specify its name and the location, please do so before continuing");
		clearInputs();
		return false;
	}
	reader.onload = function(){
		var text = reader.result;
		imageFile = text;
		console.log(imageFile);
		imageData[0] = imageFile;
		imageData[1] = imageName;
		imageData[2] = imageLocation;
		
		Json = JSON.stringify({imageData: imageData});
		console.log(Json);
		
		XMLHttp.onreadystatechange = function() {
		    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
		    	serverResponse = XMLHttp.responseText
		    	
		    }
		    	
		}
		XMLHttp.open("POST", "PHP/insertImage.php", true);
		XMLHttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
		XMLHttp.send(Json);
	}
	reader.readAsDataURL(imageFile);
}