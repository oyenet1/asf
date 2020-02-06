<?php
	include("dbconnect.php");
	
	/*$sql = 'INSERT INTO `comment` ( `firstname`, `lastname`, `comment`) VALUES ("Oyerinde", "Adeoluwa", "By the grace of God, I am going to get this scholarship ") ';*/

	$sql = 'SELECT comment_id, firstname, lastname, comment FROM `comment`';

	//To print out Data from database
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "comment_id: " . $row["comment_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"].  " " . $row["comment"]. "<br>";
		}
	} else {
		echo "0 results";
	}
	
	/*if(mysqli_query($conn,$sql)) {
		$output = "Record(s) successfully inserted" . mysqli_insert_id($conn);
	}else {
		$output = "Failed!!! because: ". mysqli_error($conn);
	}*/
	
	//echo  $output;
?>