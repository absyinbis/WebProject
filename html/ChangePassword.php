<?php 
session_start();
 ?>

<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

	<title>login</title>

	<link rel="stylesheet"  type="text/css" href="../css/loginstyle.css">

</head>
<body>
<form action="../php/changepassword.php" method="POST">
	  <div class="container">

    	<label for="uname"><b>Passowrd</b></label>
    	<input type="text" placeholder="Enter Password" name="passowrd" required>

    	<button type="submit">Login</button>

  	</div>

  	<div class="container1">
    	<span class="psw"><a href="ForgetPassword.php">هل نسيت كلمة المرور ؟</a></span>
  	</div>
</form>
</body>
</html>