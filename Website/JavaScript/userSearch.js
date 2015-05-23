window.addEventListener("load", function findSearchButton(){
	var button = document.getElementById("find-users").addEventListener("click",searchUsers);
	searchUsers();
});

function searchUsers(){
	var XMLHttp;
	var searchField;
	var serverResponse;
	var data = [];
	var JSONdataToSend;
	XMLHttp = new XMLHttpRequest();
	
	
	searchField = document.getElementById("search-parameter").value;
	document.getElementById("search-parameter").value = "";
	
	data[0] = searchField;
	JSONdataToSend = JSON.stringify(data);
	XMLHttp.onreadystatechange=function()
	  {
		  if (XMLHttp.readyState==4 && XMLHttp.status==200){
				serverResponse = XMLHttp.responseText 
				document.getElementById("user-search").innerHTML =  serverResponse;
		  }
	  }
	XMLHttp.open("POST","php/userSearch.php", true);
	XMLHttp.setRequestHeader("Content-type","application/json;charset=UTF-8");
	XMLHttp.send(JSONdataToSend);
}
