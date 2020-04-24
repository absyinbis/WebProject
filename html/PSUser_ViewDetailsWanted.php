<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
$wanted = getDetailsWanted($_POST["id"]);
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
			<span style="font-size: 20px">اسم المطلوب : </span>
			<span style="font-size: 20px"><?=$wanted->getName()?></span>

			<br>
			<br>

			<span style="font-size: 20px">رقم الوطني : </span>
			<span style="font-size: 20px"><?=$wanted->getNationalNumber()?></span>

			<br>
			<br>

			<span style="font-size: 20px">مطلوب لدي : </span>
			<span style="font-size: 20px"><?=$wanted->getWho()?></span>

			<br>
			<br>

			<span style="font-size: 20px">رقم امحظر : </span>
			<span style="font-size: 20px"><?=$wanted->getReportId()?></span>

			<br>
			<br>

			<span style="font-size: 20px">بتاريخ : </span>
			<span style="font-size: 20px"><?=$wanted->getDate()?></span>

			<br>
			<br>

			<span style="font-size: 20px">اسم من قام بأضافة المطلوب : </span>
			<span style="font-size: 20px"><?=$wanted->getUser()?></span>
			</div>

			<div style="text-align: center;margin-top: 170px;">
		    <form action="#" method="post">
		    	<input type="hidden" name="id" value="<?=$wanted->getId()?>">
		    	<input class="btn" type="submit" value="تم ايجاد المطلوب">
		    </form>
			</div>

	</div>
</div>


 <?php 
include("Footer.html");
  ?>