<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

	<title>login</title>

	<link rel="stylesheet"  type="text/css" href="../css/loginstyle.css">
</head>
<body>
	<form action="../php/check.php" method="post">
		<div class="container">

    	<label for="username"><b>Username</b></label>
    	<input type="text" placeholder="Enter Your PIN" name="code" required>

    	<button type="submit">Login</button>

  		</div>
	</form>
	
</body>
</html>