<?php
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['id']) && isset($_SESSION['usertype'])){
		unset($_SESSION['username']);
		unset($_SESSION['id']);
		unset($_SESSION['usertype']);
		exit('1');	
	} else {
		exit('0');
	}


?>