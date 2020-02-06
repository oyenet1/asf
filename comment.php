<?php

  //initialise database connection by including the file
  include('dbconnect.php');

  // Declaring the form variables and set to empty values
  $errors = array('firstname'=>'', 'lastname'=>'', 'subject'=>'');
  $fnameErr = $lnameErr = $commentErr = "";
  $fname = $lname = $comment = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $errors['firstname'] = "Name can only contains letters and white space!";
    }
    $lname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $errors['lastname'] = "Name can only contains letters and white space!";
    }
    $comment = test_input($_POST["subject"]);

    if(array_filter($errors)) {
      //echo 'Error in the form';
    } else {
      header('Location: index.php');
    }
    
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>


<!doctype html>
<html>
	<head>
		<title>comment</title>
		<style>
			* {
  box-sizing: border-box;
}

/* Style inputs */
.input1[type=text], .input1 {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #1abc9c;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the containar/contact section */
.containar {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column1 {
  width: 100%;
  margin-top: 6px;
  padding: 20px;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column1, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

/* styling error message in red */
  .error {
    color: red;
  }
		</style>
	</head>
	<body>
		<div class="containar">
  <div style="text-align:center">
    <h2 style="text-align: center; color: white; background-color: #1abc9c; padding: 7px 0px; ">Comment on This Post</h2>
  </div>
    <div class="column1" style="background-color:white; border: 2px solid #1abc9c; border-radius: 5px; ">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fname">First Name</label><br>
        <span class="error"><?php echo $errors['firstname'];  ?></span>
        <input type="text" id="fname" class="input1" name="firstname" placeholder="Your name.." required>
        
        <label for="lname">Last Name</label><br>
        <span class="error"><?php echo $errors['lastname'];  ?></span>
        <input type="text" id="lname" class="input1" name="lastname" placeholder="Your last name.." required>
        
        <label for="subject">Subject</label><br>
        <span class="error"><?php echo $errors['subject'];  ?></span>
        <textarea id="subject" class="input1" name="subject" placeholder="Write something.." style="height:170px; margin-bottom: 0px;" required></textarea>
        
    </div>
		<div class="cont">
			<input type="submit" value="Post Comment">
		</div>
      </form>
    
</div>
	</body>
</html>