<?php

//initialise database connection by including the file
include('dbconnect.php');

// Declaring the form variables and set to empty values
$errors = array('email'=>'', 'matric'=>'', 'pswd'=>'', 'pswd2'=>'');
$email = $matric = $pswd = "";
$emailErr = $matricErr = $passErr = $passErr2 = "";
$output = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['email'])) {
        $errors['email'] = "Email is required!";
    }
    else {
        $email = test_input($_POST['email']);
     // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid Email Address";
     }
    }

    if(empty($_POST['matric'])) {
        $errors['matric'] = "Matric number can not be empty";
    }
    else {
        $matric = test_input($_POST['matric']);
        // check if matric number contains only integer
    if(!filter_var($matric, FILTER_VALIDATE_INT)) {
        $matricErr = "Genuine University/College Matric Number is required.";
     }
    }

    if(empty($_POST['pswd']) || (strlen($_POST['pswd'])) < 6 ) {
        $errors['pswd'] = "Password must be greater than 6 characters";
    }
    else{
        $pswd = test_input($_POST['pswd']);
        // check if matric number contains only integer
    }

    if(empty($_POST['pswd2']) || ($_POST['pswd2'] != $pswd)) {
        $errors['pswd2'] = "Passwords donot match";
    }
    else {
        $pswd2 = test_input($_POST['pswd2']);
    }

// insert records into tABLES
$sql = "INSERT INTO user (matric_no, email, password) VALUES ('$matric', '$email', '$pswd')";
$run_query = (mysqli_query($conn, $sql));
if($run_query) {
  $output = "Registration is Successful.";
} else {
  $output = "Error: " . "<br>" . mysqli_error($conn);  
}

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>register</title>
  <link rel="stylesheet" href="css/form.css">
  <style>
    .bg-dar {
              -webkit-background-size: cover !important;
              -moz-background-size: cover !important;
              -o-background-size: cover !important;
              background-size: cover !important;
              background: url(image/uniabj.jpg) no-repeat fixed center;
              color: white;
          }
  </style>
</head>
<body class="bg-dar">
  <h1> <?php echo $output; ?> </h1>
  <div class="formcenter">
    <h2>Create an Acccount</h2>
    <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="email" name="email" id="mail1" class="input1" placeholder="Enter Email">
      <span class="error"><?php echo $errors['email']; echo $emailErr;  ?></span>
      <input type="number" id="text" placeholder="Enter Matric No" class="input1" name="matric">
      <span class="error"><?php echo $errors['matric']; echo $matricErr;  ?></span>
      <input type="password" id="typepass" class="input1" placeholder="Enter password" name="pswd">
      <span class="error"><?php echo $errors['pswd'];  ?></span>
      <input type="password" class="input1" placeholder="Repeat password" name="pswd2">
      <span class="error"><?php echo $errors['pswd2'];  ?></span>
      <input type="checkbox" onclick="Toggle()">
      Show Password
      <script type="text/javascript">
        // Change the type of input to password or text
        function Toggle() {
            var temp = document.getElementsById("typepass");
            if (temp.type === "password") {
                temp.type = "text";
            } else {
                temp.type = "password";
            }
        }
    </script>
      <input type="submit" value="Create an Account">
    </form>
    <p align="center">Already a member <a href="login.php" id="register-btn"> Login Here</a></p>
  </div>
</body>
</html>