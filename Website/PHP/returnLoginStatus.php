<?php
	
	session_start();
	$userType;
	
	if(isset($_SESSION['usertype'])){
		exit('1');
	} else if(isset($_SESSION['usertype'])){
		exit('0');		
	} else {
		exit('-1');
	}
	

?>