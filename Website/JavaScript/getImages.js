document.addEventListener("DOMContentLoaded", retrieveImages());


function retrieveImages(){
	var serverResponse;
	var code;
	var XMLHttp = new XMLHttpRequest();
	
	XMLHttp.onreadystatechange = function() {
	    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
	    		serverResponse = XMLHttp.responseText;
	    		document.getElementById("images").innerHTML =  serverResponse;
	    	}
		}
	XMLHttp.open("GET", "PHP/getImages.php", true);
	XMLHttp.send();
}