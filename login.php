<?php  
  //to start a session
  session_start();

  //initialise database connection by including the file
  include('dbconnect.php');

  // Declaring the form variables and set to empty values
  $errors = array('email'=>'', 'matric'=>'', 'pswd'=>'',);
  $email = $matric = $pswd = "";
  $emailErr = $passErr = "";
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

      if(empty($_POST['pswd']) || (strlen($_POST['pswd'])) < 6 ) {
          $errors['pswd'] = "Password must be greater than 6 characters";
      }
      else{
          $pswd = test_input($_POST['pswd']);
          // check if matric number contains only integer
      }

      
        // get records from tABLES
        $sql = "SELECT * FROM user WHERE email='$email' and password='$pswd' ";
        $run_query = (mysqli_query($conn, $sql));

        $result = mysqli_num_rows($run_query);
        if($result == 1) {
          
          $_SESSION['email'] = $email;
          header("location: index.php");
        } else {
          echo "Invalid user, check your login details and try again";
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
    <title>Document</title>
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
  <h3 class="date"><?php echo date("l, F, jS Y "); ?></h3>
    <div class="formcenter">
    <h2>Login </h2>
      <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="email" name="email" id="mail1" class="input1" placeholder="Enter Email">
      <span class="error"><?php echo $errors['email']; echo $emailErr;  ?></span>
        <input type="password" id="typepass" placeholder="Enter password" class="input1" name="pswd">
        <span class="error"><b><?php echo $errors['pswd'];  ?></b></span>
        <input type="checkbox" onclick="Toggle()">
        Show Password
        <a href="for-pass.php" class="float-right">Forget passsword</a>
        <script type="text/javascript">
          // Change the type of input to password or text
          function Toggle() {
              var temp = document.getElementById("typepass");
              if (temp.type === "password") {
                  temp.type = "text";
              } else {
                  temp.type = "password";
              }
          }
      </script>
        <input type="submit" value="Login">
      </form>
      <p align="center">New User? <a href="register.php" id="register-btn">Register Here</a></p>
    </div>
  </body>
</html>