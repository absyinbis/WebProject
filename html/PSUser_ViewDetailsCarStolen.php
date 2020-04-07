<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
$car = getDetailsCar($_GET["id"]);
 ?>

<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
	 	<div id="one">
			<div>صورة المطلوب</div>
			<?php
				echo '<img style="width: 250px; height: 250px; margin-top: 10px " src="data:img/jpeg;base64, '.base64_encode($car->getImg()).' " /> ';
			 ?>
	    </div>
	      
		<div id="two">
			<span style="font-size: 40px">اسم المطلوب : </span>
			<div><?=$car->getVehicleType()?></div>
		</div>

	</div>
</div>


 <?php 
include("Footer.html");
  ?>