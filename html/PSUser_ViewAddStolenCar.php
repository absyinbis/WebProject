<?php 
include("PSUser_Header.html");
?>

    <script type="text/javascript" src="http://www.carqueryapi.com/js/carquery.0.3.4.js"></script>





<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
    	<form action="../php/Add_CarStolen.php" method="post" enctype="multipart/form-data">
    		<div id="one">
    			<div>صورة السيارة</div>
			  	<img class="img" id="blah" src="http://placehold.it/180" alt="your image" />
			  	<br>
              	<input onchange="readURL(this)" type="file" accept="image/*" name="img">
    		</div>
      
		    <div id="two">
		      <div>رقم الهيكل</div>
		      <input class="input-field" type="text" name="structurenumber">

		      <div>رقم اللوحة</div>
		      <input class="input-field" type="text" name="platenumber">

		      <div>نوع السيارة ولونها</div>
		      <select class="input-field" style="width: 30%" name="car-years" id="car-years"></select>  
			  <select class="input-field" style="width: 30%" name="car-makes" id="car-makes"></select> 
			  <select class="input-field" style="width: 30%" name="car-models" id="car-models"></select>
		      <input type="color" name="color">

		      <div>الوصف</div>
		      <textarea class="input-field" name="des"></textarea>

		    </div>

		    <div style="text-align: center;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		</form>
    </div>
</div>

<script>

    document.cookie = "cq-settings" + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";

    var carquery = new CarQuery();

     //Run the carquery init function to get things started:
     carquery.init();

     //Optional: initialize the year, make, model, and trim drop downs by providing their element IDs
     carquery.initYearMakeModelTrim('car-years', 'car-makes', 'car-models');

</script>


<?php 
include("Footer.html");
?>