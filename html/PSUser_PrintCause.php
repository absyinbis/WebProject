<?php 
require_once '../php/MangerPoliceStation.php';

$psm = cPoliceStationManger::getInstance();
try{

$result = $psm->checkcause($_POST["nationalnumber"]);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());


}

catch(Exception $e){

		echo $e->getMessage();
		exit;

}

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
	<h1 style="text-align: center;">ليبيا</h1>
	<h1 style="text-align: center;">ةزارة الداخلية</h1>
	<h2 style="text-align: center;">الادارو العامة للبحث الجنائي</h2>
	<h2 style="text-align: center;">قسم التحقيق الشخصية</h2>

	<br>
	<br>

	<div style="font-size: 50px; text-align: center;">شهادة الحالة الجنائية</div>

	<br>
	<br>
	<br>


	<span>الاسم بالكامل : </span> <span>.....................................................</span>
	<span>اللقب</span> <span>........................................................</span>

	<br>
	<br>

	<span>اسم الوالدة بالكامل : </span> <span>........................................................</span>
	<span>تاريخ ومكان الميلاد : </span> <span>.....................................................</span>

	<br>
	<br>

	<span>الرقم الوطني : </span> <span>.....................................................</span>
	<span>جهة اضدارها : </span> <span>.....................................................</span>

	<br>
	<br>

	<h2 style="text-align: center;">بالبحث في القيودات اتضح الاتي :</h2>

<?php 
if ($result)
	echo "<h1>يوجد لديه سوابق</h1>";
else
	echo "<h1>لا يوجد لديه سوايق</h1>";
 ?>


	<span>اسم الباحث : </span> <span>.....................................................</span>
	<span>التوقيع : </span> <span>.....................................................</span>

	<br>
	<br>
	<br>


	<h3>وقد اعطيت هذه لصاحب المصلحة بناء علي طلبه وذلك لاستعمالها في الاغراض التي يسمح لها القنون وتسري لمدة ستة اشهر من تاريخ اصدارها</h3>

	<br>
	<br>

	<span>تاريخ اصدارها : </span> <span><?php echo date("Y/m/d"); ?></span>
	<span style="float:left;">الختم : ....................................................</span>












</body>
</html>
	<script>
		print();
	</script>