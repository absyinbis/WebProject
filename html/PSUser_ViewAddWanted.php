<?php 
session_start();

include("PSUser_Header.html");
?>

<div class="row">
	<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
    	<div style="text-align: center; color: red;">
        <?php 
        if (isset($_SESSION["ERROR"]))
        {
          echo $_SESSION["ERROR"];
          $_SESSION["ERROR"]= ""; 
        }
        ?>
      </div>
    	<form action="../php/Add_Wanted.php" method="post" enctype="multipart/form-data">

    		<div id="two">
		      <div>اسم المطلوب</div>
		      <input class="input-field" type="text" name="name" required>

		      <div>رقم الوطني لمطلوب</div>
		      <input class="input-field" type="text" name="nationalnumber" required>

		      <div>رقم المحظر</div>
		      <input class="input-field" type="text" name="reportid" required>
		    </div>
		    

		    <div style="text-align: center;margin-top: 170px;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		    </div>
		</form>
    </div>
</div>
</div>


<?php 
include("Footer.html");
?>