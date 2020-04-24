<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
session_start();
if (!isset($_POST["id"]))
$_POST["id"] = $_SESSION["report_id"];

$report = getDetailsReport($_POST["id"]);
 ?>
    <script src="../javascript/zoompic.js"></script>

<div class="leftcolumn" style="width: 100%; float: right;">
	    	<div id="lb-back">
      			<div id="lb-img"></div>
    		</div>
    <div class="card">

	 	<div id="one">
			<div>صور المحظر</div>
      <div class="w3-content w3-display-container" style="width:200px;height: 200px; ">
			<?php
			$result = getImg($_POST["id"]);
	    while ($row = mysqli_fetch_array($result)) {
         echo '<img style="display: none;width:200px;height:200px " class="nature" src="data:img/jpeg;base64, '.base64_encode($row['img']).' ">';
      }
    
			?>
      <button class="w3-button w3-black w3-display-left" onclick="myShow.previous()">&#10095;</button>
      <button class="w3-button w3-black w3-display-right" onclick="myShow.next()">&#10094;</button>
        </div>
        	<br>

        	<form action="../php/Add_MoreFiles.php" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="id" value="<?=$_POST["id"]?>">
        	<input onchange="readURL(this)" type="file" multiple="multiple" accept="image/*" name="img[]" required>
            <input class="btn" type="submit" value="اضافة ملفات">
        	</form>

	    </div>
	      
		<div id="two">
			<span style="font-size: 20px">اسم صاحب المحظر : </span>
			<span style="font-size: 20px"><?=$report->getNameYou()?></span>

			<!--
			<br>
			<br>

			<span style="font-size: 20px">اسم المفتوح فيه المحظر : </span>
			<span style="font-size: 20px"><?=$report->getNameHim()?></span>
			!-->

			<br>
			<br>

			<span style="font-size: 20px">رقم المحظر : </span>
			<span style="font-size: 20px"><?=$report->getId()?></span>

			<br>
			<br>

			<span style="font-size: 20px">نوع المحظر : </span>
			<span style="font-size: 20px"><?=$report->getReportType()?></span>

			<br>
			<br>

			<span style="font-size: 20px">رقم الهاتف : </span>
			<span style="font-size: 20px"><?=$report->getPhoneNumber()?></span>

			<br>
			<br>

			<span style="font-size: 20px">تاريخ المحظر : </span>
			<span style="font-size: 20px"><?=$report->getDate()?></span>

			<br>
			<br>

			<span style="font-size: 20px">اسم من قام بأضفة المحظر : </span>
			<span style="font-size: 20px"><?=$report->getUser()?></span>

			<br>
			<br>

			<span style="font-size: 20px">حالة المحظر : </span>
			<span style="font-size: 20px"><?php if($report->getState() == 1) echo "مفتوح"; else echo "مغلق";?></span>


			
			</div>

		    <div style="text-align: center;margin-top: 170px;">
		    <form action="../php/Delete_Report.php" method="post">
		    	<input type="hidden" name="id" value="<?=$report->getId()?>">
		    	<input class="btn" type="submit" value="اغلاق المحظر">
		    </form>
			</div>

	</div>
</div>


<script>
myShow = w3.slideshow(".nature",0);
</script>

 <?php 
 $_POST = array();
include("Footer.html");
  ?>