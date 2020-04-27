<?php 

include("PSNyaba_Header.html");

 ?>

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

    	<form action="../php/Add_Cause.php" method="post">

    		<div id="two">
		      <div>رقم القضية</div>
		      <input class="input-field" type="text" name="cause_id">

		      <div>رقم المحظر</div>
		      <input class="input-field" type="text" name="report_id">

		      <div>الرقم الوطني</div>
		      <input class="input-field" type="text" name="national_number">
		    </div>
		    

		    <div style="text-align: center;margin-top: 170px;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		    </div>
		</form>
    </div>
</div>

 <?php 

include("Footer.html");

 ?>