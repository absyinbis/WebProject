<?php 
include("PSUser_Header.html");
?>

<script type="text/javascript" src="https://www.carqueryapi.com/js/jquery.min.js"></script>
<script type="text/javascript" src="https://www.carqueryapi.com/js/carquery.0.3.4.js"></script>



<div class="row">
	<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
    	<form action="../php/Add_CarStolen.php" method="post" enctype="multipart/form-data">
    		<div id="one">
		      <div>الوصف</div>
		      <textarea class="input-field" style="width: 640px;height: 300px;font-size: 30px;" name="des" required></textarea>
    		</div>
      
		    <div id="two">
		      <div>رقم الهيكل</div>
		      <input class="input-field" type="text" name="structurenumber" required>

		      <div>رقم اللوحة</div>
		      <input class="input-field" type="text" name="platenumber" required>

		      <div>نوع السيارة ولونها</div>
		      <select class="input-field" style="width: 29%" name="car-years" id="car-years" required></select>  
			  <select class="input-field" style="width: 29%" name="car-makes" id="car-makes" required></select> 
			  <select class="input-field" style="width: 29%" name="car-models" id="car-models" required></select>
		      <input type="color" name="color" required>

		      <div>رقم الهاتف</div>
		      <input class="input-field" name="phonenumber" required>


		    </div>

		    <div style="text-align: center;margin-top: 170px;">
		    <input class="btn" type="submit" value="اضافة">
			</div>
		</form>
    </div>
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