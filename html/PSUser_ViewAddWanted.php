<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");

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

    			<div style="width: 50%; margin-right: 25%">
		      		<div>اسم المطلوب</div>
		      		<input class="input-field" type="text" name="name" required>
		      		<div>رقم الوطني لمطلوب</div>
		      		<input class="input-field" type="text" onkeypress="return onlyNumberKey(event)" name="nationalnumber" required>

		      		<div>رقم المحظر</div>
		      		<input class="input-field" type="text" onkeypress="return onlyNumberKey(event)" name="reportid" required>
		      	</div>
		    

		    	<div style="text-align: center;">
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