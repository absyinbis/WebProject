<?php 
include("PSUser_Header.html");
?>

    <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>





<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
    	<form action="../php/Add_Report.php" method="post" enctype="multipart/form-data">
    		<div id="one">
    			<div>صورة السيارة</div>
			  	<img class="img" id="blah" src="http://placehold.it/180" alt="your image" />
			  	<br>
              	<input onchange="readURL(this)" type="file" accept="image/*" name="img">
    		</div>
      
		    <div id="two">
		      <div>اسم صاحب المحظر</div>
		      <input class="input-field" type="text" name="name_you">

		      <div>اسم الفتوح فيه المحظر</div>
		      <input class="input-field" type="text" name="name_him">

		      <div>نوع المحظر</div>
		      <select class="input-field" name="report_type"></select>  

		      <div>رقم الهاتف</div>
		      <input class="input-field" name="phonenumber">

		    </div>

		    <div style="text-align: center;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		</form>
    </div>
</div>



<?php 
include("Footer.html");
?>