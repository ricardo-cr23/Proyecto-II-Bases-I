<?php
	
	session_start();
	$userType;
	
	if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 1){
		exit('1');
	} else if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 0){
		exit('0');		
	} else {
		exit('-1');
	}
	

?>