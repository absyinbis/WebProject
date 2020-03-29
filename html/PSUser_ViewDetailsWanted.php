<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
$wanted = getDetailsWanted($_GET["id"]);
 ?>

<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">
	 	<div id="one">
			<div>صورة المطلوب</div>
			<?php
				echo '<img style="width: 250px; height: 250px; margin-top: 10px " src="data:img/jpeg;base64, '.base64_encode($wanted->getImg()).' " /> ';
			 ?>
	    </div>
	      
		<div id="two">
			<span style="font-size: 40px">اسم المطلوب : </span>
			<span style="font-size: 40px"><?=$wanted->getName()?></span>

			<br>
			<br>

			<span style="font-size: 40px">رقم الوطني : </span>
			<span style="font-size: 40px"><?=$wanted->getNationalNumber()?></span>

			<br>
			<br>

			<span style="font-size: 40px">مطلوب لدي : </span>
			<span style="font-size: 40px"><?=$wanted->getWho()?></span>

			<br>
			<br>

			<span style="font-size: 40px">رقم امحظر : </span>
			<span style="font-size: 40px"><?=$wanted->getReportId()?></span>

			<br>
			<br>

			<span style="font-size: 40px">بتاريخ : </span>
			<span style="font-size: 40px"><?=$wanted->getDate()?></span>
			</div>

	</div>
</div>


 <?php 
include("Footer.html");
  ?>