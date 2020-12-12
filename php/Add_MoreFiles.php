<?php 
session_start();
require_once 'MangerReport.php';

$rm = cReportManger::getInstance();
try{

foreach ($_FILES["img"]["tmp_name"] as $value) 
{
	$img = addslashes(file_get_contents($value));
	$rm->addimg($_POST["id"],$img);
}

$account = unserialize($_SESSION["ACCOUNT"]);

$logg = new cLogg();
$logg->setProcess("اضافة ملفات الي المحظر");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


$_SESSION["report_id"] = $_POST["id"];

header("Location:../html/PSUser_ViewDetailsReport.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewDetailsReport.php");


}