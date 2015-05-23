window.addEventListener("load",function findLogoutButton(){
	var button = document.getElementById("logout").addEventListener("click", signOut); 
});

function signOut(){
	var XMLHttp;
	var serverResponse;
	var code;
	
	XMLHttp = new XMLHttpRequest();
	  XMLHttp.onreadystatechange = function() {
		    if (XMLHttp.readyState == 4 && XMLHttp.status == 200) {
		    	serverResponse = XMLHttp.responseText;
		    	code = parseInt(serverResponse);
		    	if(code == 1){
		    		alert("Logout succesful, press ok to be redirected.");
		    		window.location = "index.php";
		    	} else {
		    		alert("There was a problem with the logout, please try again.")
		    	}
		    }
		  }
	  XMLHttp.open("GET", "PHP/logout.php", true);
	  XMLHttp.send();
}