window.addEventListener("load", function findImageUploadButton (){
	var button = document.getElementById("upload image").addEventListener("click", sendImage);
});

function clearInputs(){
	document.getElementById("image").value = "";
	document.getElementById("name").value = "";
	document.getElementById("location").value = "";
}

function utf8_to_b64(str) {
    return window.btoa(unescape(encodeURIComponent(str)));
}

function b64_to_utf8(str) {
    return decodeURIComponent(escape(window.atob(str)));
}

function sendImage(){
	var imageName;
	var imageLocation;
	var image;
	var species;
	var imageData = [];
	var Json;
	var regex = /\.(?:jpe?g|png|gif)$/;
	var XMLHttp = new XMLHttpRequest();
	var code;
	var serverResponse;
	
	image = document.getElementById("image");
	imageFile = document.getElementById("image").files[0];
	imageName = document.getElementById("name").value;
	imageLocation = document.getElementById("location").value;
	if(image.value == "" || imageName == "" || imageLocation == "" || !regex.test(image.value)){
		
		alert("You must upload a .gif, .jpg or .png file and you must specify its name and the location, please do so before continuing");
		clearInputs();
		return false;
	}
	
	imageData[0] = imageFile;
	imageData[1] = imageName;
	imageData[2] = imageLocation;
	
	Json = JSON.stringify({imageData: imageData});
	XMLHttp.onreadystatechange = function() {
	    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
	    	serverResponse = XMLHttp.responseText;
	    	console.log(serverResponse);
	    }
	    	
	}
	XMLHttp.open("POST", "PHP/insertImage.php", true);
	XMLHttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	XMLHttp.send(Json);
}