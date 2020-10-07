<?php 
include("PSNyaba_Header.html");
?>

<?php 
require_once  '../php/lib_db.php';
$cause = getCauseDetails($_POST["id"]);
 ?>

<div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

		<div id="two">
			<span style="font-size: 20px">رقم اقضية : </span>
			<span style="font-size: 20px"><?=$cause->getId()?></span>

			<br>
			<br>

			<span style="font-size: 20px">رقم الوطني : </span>
			<span style="font-size: 20px"><?=$cause->getNationalNumber()?></span>

			<br>
			<br>

			<span style="font-size: 20px">القضية مسجله لدي : </span>
			<span style="font-size: 20px"><?=$cause->getWho()?></span>

			<br>
			<br>

			<span style="font-size: 20px">نوع المحظر : </span>
			<span style="font-size: 20px"><?=$cause->getReportType()?></span>

			<br>
			<br>

			<span style="font-size: 20px">رقم المحظر : </span>
			<span style="font-size: 20px"><?=$cause->getReportId()?></span>

			<br>
			<br>

			<span style="font-size: 20px">بتاريخ : </span>
			<span style="font-size: 20px"><?=$cause->getDate()?></span>

			<br>
			<br>

			<span style="font-size: 20px">اسم من قام باضافة القضية : </span>
			<span style="font-size: 20px"><?=$cause->getUser()?></span>
			</div>

	</div>
</div>

<?php 
include("Footer.html");
?>