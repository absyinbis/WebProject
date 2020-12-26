<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");


include("PSUser_Header.html");
?>

<script type="text/javascript" src="../AES/AesCtr.js"></script>

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
		    	<textarea id="report_text" class="input-field" style="width: 100%;height: 220px;font-size: 30px;" required></textarea>
				<input type="hidden" name="report_text" id="en_u">
		    	<div>ملفات المحظر</div>
			  	<br>
              	<input onchange="readURL(this)" type="file" multiple="multiple" accept="image/*" name="img[]">
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

		    <div style="text-align: center;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		</form>
    </div>
</div>
</div>

<script type="text/javascript">
  var report_text = document.getElementById("report_text");
  var en = document.getElementById("en_u");
  report_text.onkeyup = function(){
    en.value = AesCtr.encrypt(report_text.value,'absy', 256);
  };
</script>



<?php 
include("Footer.html");
?>