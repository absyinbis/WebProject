<?php 
session_start();


include("PSUser_Header.html");
?>

    <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>




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
    	<form action="../php/Add_Report.php" method="post" enctype="multipart/form-data">
    		<div id="one">
              	<div>المحظر</div>
		    	<textarea class="input-field" style="width: 640px;height: 220px;font-size: 30px;" name="report_text" required></textarea>
		    	<div>ملفات المحظر</div>
			  	<br>
              	<input onchange="readURL(this)" type="file" multiple="multiple" accept="image/*" name="img[]" required>
    		</div>
      
		    <div id="two">
		      <div>اسم صاحب المحظر</div>
		      <input class="input-field" type="text" name="name_you" required>

		      <div>اسم الفتوح فيه المحظر</div>
		      <input class="input-field" type="text" name="name_him">

		      <div>نوع المحظر</div>
		      <input class="input-field" type="text" name="report_type" required>

		      <div>رقم الهاتف</div>
		      <input class="input-field" onkeypress="return onlyNumberKey(event)" name="phonenumber" required>

		    </div>

		    <div style="text-align: center;margin-top: 170px;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		</form>
    </div>
</div>
</div>



<?php 
include("Footer.html");
?>