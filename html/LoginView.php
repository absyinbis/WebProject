<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

	<title>login</title>

	<link rel="stylesheet"  type="text/css" href="../css/loginstyle.css">

</head>
<body>
<form action="../php/login.php" method="POST">
	  <div class="container">

      <div style="text-align: center; color: red;">
        <?php 
        if (isset($_SESSION["ERROR"]))
        {
          echo $_SESSION["ERROR"];
          $_SESSION["ERROR"]= ""; 
        }
        ?>
      </div>


    	<label for="uname"><b>Username</b></label>
    	<input type="text" placeholder="Enter Username" name="username" required>

    	<label for="psw"><b>Password</b></label>
    	<input type="password" placeholder="Enter Password" name="password" required>

    	<button type="submit">Login</button>

  	</div>

  	<div class="container1">
    	<span class="psw"><a href="ForgetPassword.php">هل نسيت كلمة المرور ؟</a></span>
  	</div>
</form>
</body>
</html>