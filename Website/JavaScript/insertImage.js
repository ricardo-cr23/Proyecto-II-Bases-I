window.addEventListener("load", function findImageUploadButton (){
	var button = document.getElementById("upload image").addEventListener("click", sendImage);
});

function sendImage(){
	var imageName;
	var imageLocation;
	var image;
	var species;
	var imageData = [];
	var Json;
	var regex = /\.(?:jpe?g|png|gif)$/;
	var XMLHttp = new XMLHttpRequest();
	
	image = document.getElementById("image");
	imageName = document.getElementById("name").value;
	imageLocation = document.getElementById("location").value;

	if(image.value == "" || imageLocation == ""  || imageName == "" || !regex.test(image)){
		document.getElementById("image").value = "";
		document.getElementById("name").value = "";
		document.getElementById("location").value = "";
		alert("You must upload a .gif, .jpg or .png file and you must specify its name and the location, please do so before continuing");
		return false;
	}
	
	imageData[0] = image;
	imageData[1] = imageName;
	imageData[2] = imageLocation;
	
	Json = JSON.stringify({imageData: imageData});
	
	console.log(Json);
}