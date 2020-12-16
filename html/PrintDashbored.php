<?php 
require_once  '../php/lib_obj.php';
require_once  '../php/lib_db.php';
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			direction: rtl;
		}
	</style>
</head>
<body>
	<?php 
	$user = unserialize($_SESSION["ACCOUNT"]);
	$ps_id = $_POST["ps_id"] ?? null;
	$startdate = $_POST["startdate"] ?? "";
	 ?>
	<h1 style="text-align: center;">ليبيا</h1>
	<h1 style="text-align: center;">ةزارة الداخلية</h1>
	<h2 style="text-align: center;">الادارو العامة للبحث الجنائي</h2>
	<h2 style="text-align: center;">قسم التحقيق الشخصية</h2>

	<br>
	<br>

	<?php 
	if ($ps_id == "0") { 
	?>

	<h2>هذه الاحصائية شاملة جميلج المراكز الشركة في جميع روبوع ليبيا </h2>

	<?php } else {
		$psName = getPoliceStationsNameById($ps_id)->getName();
		?>

	<h2>هذه اصائية خاصة بمركز  شرطة  <?=$psName?></h2>

	<?php } ?>

	<?php 
	if ($startdate != "") {
	?>

	<span>من تاريخ   <?=$_POST["startdate"]?>  الي تاريخ    <?=$_POST["enddate"]?></span>

	<?php
		}
	?>

	<br>
	<br>

	<span>المحاظؤ : </span> <span>...............<?=$_POST["report"]?> محظر...............</span>

	<br>

	<span>السيارات المسروقة : </span> <span>...............<?=$_POST["carstolen"]?> سيارة...............</span>

	<br>

	<span>المطلوبين : </span> <span>...............<?=$_POST["wanted"]?> مطلوب...............</span>

	<br>

	<span>القضايا  : </span> <span>...............<?=$_POST["cause"]?> قضية...............</span>

	<br>

	<span>المستخدمين  : </span> <span>...............<?=$_POST["user"]?> حمستخدك...............</span>

	<br>
	<br>
	<br>

	<span>اسم الباحث : </span> <span>.................<?=$user->getName()?>.....................</span>

	<br>

	<span>تاريخ اصدارها : </span> <span><?php echo date("Y/m/d"); ?></span>




</body>
</html>
	<script>
		print();
	</script>