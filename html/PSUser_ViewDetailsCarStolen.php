<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
$car = getDetailsCar($_POST["id"]);
 ?>

<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
	 	<div id="one">
			<div>التفاصيل</div>
			<textarea readonly="true" class="input-field" style="width: 640px;height: 300px;font-size: 30px;"><?=$car->getDescription()?>
			</textarea>
	    </div>
	      
		<div id="two">
			<span style="font-size: 20px">رقم الهيكل :</span>
			<span style="font-size: 20px"><?=$car->getStructureNumber()?></span>
			<br>
			<span style="font-size: 20px">رقم اللوحة :</span>
			<span style="font-size: 20px"><?=$car->getPlateNumber()?></span>
			<br>
			<span style="font-size: 20px">نوع السيارة : </span>
			<span style="font-size: 20px"><?=$car->getVehicleType()?></span>
			<br>
			<span style="font-size: 20px">الموديل : </span>
			<span style="font-size: 20px"><?=$car->getModel()?></span>
			<br>
			<span style="font-size: 20px">سنة الصنع : </span>
			<span style="font-size: 20px"><?=$car->getYearCar()?></span>
			<br>
			<span style="font-size: 20px">اللون : </span>
			<span style="font-size: 20px"><?=$car->getColor()?></span>
			<br>
			<span style="font-size: 20px">رقم الهاتف : </span>
			<span style="font-size: 20px"><?=$car->getPhoneNumber()?></span>
			<br>
			<span style="font-size: 20px">التاريخ : </span>
			<span style="font-size: 20px"><?=$car->getDate()?></span>
			<br>
			<span style="font-size: 20px">مركز الشرطة : </span>
			<span style="font-size: 20px"><?=$car->getWho()?></span>
			<br>
			<span style="font-size: 20px"></span>
			<span style="font-size: 20px"><?=$car->getUser()?></span>
		</div>

	</div>
</div>


 <?php 
include("Footer.html");
  ?>