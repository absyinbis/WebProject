<?php 
include("PSUser_Header.html");
?>


<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
    	<form action="../php/Add_Wanted.php" method="post" enctype="multipart/form-data">
    		<div id="one">
			  <div>صورة المطلوب</div>
			  <img class="img" id="blah" src="http://placehold.it/180" alt="your image" />
			  <br>
              <input onchange="readURL(this)" type="file" accept="image/*" name="img">
    		</div>
      
		    <div id="two">
		      <div>اسم المطلوب</div>
		      <input class="input-field" type="text" name="name">

		      <div>رقم الوطني لمطلوب</div>
		      <input class="input-field" type="text" name="nationalnumber">

		      <div>رقم المحظر</div>
		      <input class="input-field" type="text" name="reportid">
		    </div>

		    <div style="text-align: center;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		    </div>
		</form>
    </div>
</div>


<?php 
include("Footer.html");
?>