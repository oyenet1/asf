<?php

	//connevt to database
	$conn = mysqli_connect("localhost", "naas", "uniabuja", "asf");

	//check connection
	if(!$conn){
		echo 'Connection errror: ' . mysqli_connect_error();
	}

?>