<!doctype html>
<html>
	<head>
		<title>Subscribe</title>
		<style>
			/* Style the form element with a border around it */
.form {
  border: 2px solid #f1f1f1;
  border-radius: 5px;
}

/* Add some padding and a grey background color to containers */
.cont {
  padding: 5px;
  background-color: #f1f1f1;
}

/* Style the input elements and the submit button */
.input[type=text], .input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Add margins to the checkbox */
input[type=checkbox] {
  margin-top: 16px;
}

/* Style the submit button */
.input[type=submit] {
  background-color: #1abc9c;
  color: white;
  border: none;
  border-radius: 5px;
}

input[type=submit]:hover {
  opacity: 0.8;
}

.input[type=text]:focus {
	border: 2px solid #1abc9c;
}
		</style>
	</head>
	<body>
		<form action="action_page.php" class="form">
  <div class="cont">
    <h2 style="text-align: center; color: white; background-color: #1abc9c; padding: 7px 0px; ">Subscribe to our Newsletter To Receive
Latest Funding Opportunities
And Competitons.</h2>
  </div>

  <div class="cont" style="background-color:white; border: 2px solid #1abc9c; border-radius: 5px;">
    <input type="text" placeholder="Name" name="name" required class="input">
    <input type="text" placeholder="Email address" name="mail" required class="input">
    <label>
      <input type="checkbox" checked="checked" name="subscribe"> Daily Newsletter
    </label>
  </div>

  <div class="cont">
    <input type="submit" value="Subscribe" class="input">
  </div>
</form>
	</body>
</html>
