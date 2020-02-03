<?php 
session_start();
 ?>

<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet"  type="text/css" href="../css/loginstyle.css">

</head>
<body>
<form action="../php/login.php" method="POST">
	<div class="login-content">
		<table >
			<tr><th>تسجيل الدخول</th></tr>
			<tr><td style="color: red;"><?php if(isset($_SESSION["ERROR"])){ echo $_SESSION["ERROR"];
			$_SESSION["ERROR"]='';}?></td></tr>
			<tr>
				<td>
					<div class="input-container">
					<i class="fa fa-user icon"></i>
					<input class="input-field"  type="text" name="username" placeholder="ادخل اسم المستخدم" required>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="input-container">
					<i class="fa fa-key icon"></i>
					<input class="input-field"  type="password" name="password" placeholder="ادخل كلمة المرور" required>
					</div>
				</td>
			</tr>
			<tr><td><input class="btn" type="submit" value="تسجيل الدخول"></td></tr>
		</table>
	</div>
</form>
</body>
</html>