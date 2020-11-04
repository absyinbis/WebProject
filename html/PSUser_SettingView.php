<?php 

include("PSUser_Header.html");

 ?>


 <div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

    	<div style="text-align: center;">
    		<form action="../php/changephonenumber.php" method="post">
	    		<div>تغير رقم الهاتف</div>
	    		<input class="input-field" style="width: 50%" placeholder="الرجاء ادخال اسم المستخدم الجديد" type="text" name="username" required>
	    		<br>
	    		<input class="btn" type="submit" value="تتغير اسم المستخدم">
			</form>

    		<br>
    		<br>

    		<form action="../php/changepassword1.php" method="post">
	       		<div>كلمة المرور</div>
	    		<input class="input-field" style="width: 50%" placeholder="الرجاء ادخال  كلمة المرور الجديدة" type="text" name="password" required>
	    		<br>
	    		<input name="type" class="btn" type="submit" value="تغير كلمة  المرور">
			</form>
    	</div>

    </div>
  </div>
</div>

<?php 

include("Footer.html");

 ?>