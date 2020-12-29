<?php 
session_start();
if(!isset($_POST["id"]))
  header("Location:LoginView.php");

require_once  '../php/lib_db.php';
require_once '../AES/AesCtr.php';

$report = getDetailsReport($_POST["id"]);
$result = getImg($_POST["id"]);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Report</title>
	<style type="text/css">
		body{
			direction: rtl;
		}
	</style>
</head>
<body>
			<span style="font-size: 20px">اسم صاحب المحظر : </span>
			<span style="font-size: 20px"><?=$report->getNameYou()?></span>

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

			<br>
			<br>

			<h1 style="text-align: center;"> المحظر</h1>
			<span style="font-size: 20px"><?php echo AesCtr::decrypt($report->getReportText(),'absy',256); ?></span>

			<br>
			<br>

			<?php
			while ($row = mysqli_fetch_array($result)) {
         echo '<img style="width:700px;height:700px" src="data:img/jpeg;base64, '.base64_encode($row['img']).' ">'; 
         }
			 ?>
</body>
</html>
	<script>
		print();
	</script>