<?php 
session_start();
require_once '../php/lib_obj.php';

$ps = unserialize($_SESSION["ACCOUNT"]);

switch ($ps->getAccess()) {
        case 0: include("Admin_Header.html");
        	break;
        	
        case 1: include("PS_Header.html");
        	break;

        case 2: include("PSNyaba_Header.html");
                break;

        case 3: include("PSUser_Header.html");
}
		
?>


 <div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div style="text-align: center; color: red;">
        <?php 
        if (isset($_SESSION["ERROR"]))
        {
          echo $_SESSION["ERROR"];
          $_SESSION["ERROR"]= ""; 
        }
        ?>
      </div>
    <div class="card">
    	<div style="text-align: center;"> <?=$ps->getPhoneNumber()?> </div>

    	<div style="text-align: center;">
    		<form action="../php/changephonenumber.php" method="post">
	    		<div>تغير رقم الهاتف</div>
	    		<input class="input-field" style="width: 50%" placeholder="الرجاء ادخال اسم المستخدم الجديد" type="text" name="phonenumber" required>
	    		<br>
	    		<input class="btn" type="submit" value="تتغير اسم المستخدم">
			</form>

    		<br>
    		<br>

    		<form action="../php/changepassword.php" method="post">
	       		<div>كلمة المرور</div>
	    		<input class="input-field" style="width: 50%" placeholder="الرجاء ادخال  كلمة المرور الجديدة" type="text" name="password" required>
	    		<br>
                <div>كلمة المرور</div>
                <input class="input-field" style="width: 50%" placeholder="الرجاء ادخال  كلمة المرور الجديدة" type="text" name="password1" required>
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