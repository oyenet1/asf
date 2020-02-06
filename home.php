<?php
	include("connect.php");
	$output = "";
	
	$sql = "SELECT * FROM naas"; // To get all the records in a data table
	
	$result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_assoc($result)) {
	$output .= $row["firstname"] . "   ". $row["lastname"] . "   " . $row["age"]. "<br>";
	}
	
	require("template.php");

?>