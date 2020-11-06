<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerReport.php';

$rm = cReportManger::getInstance();
try{


$account = unserialize($_SESSION["ACCOUNT"]);

$report = new cReport();

$report->setNameYou($_POST["name_you"]);
$report->setNameHim($_POST["name_him"]);
$report->setReportType($_POST["report_type"]);
$report->setReportText($_POST["report_text"]);
$report->setPhoneNumber($_POST["phonenumber"]);
$report->setDate(date('Y/m/d H:i:s'));
$report->setWho($account->getWho());
$report->setUser($account->getId());
$report->setState(1);

$last_id = $rm->addreport($report);

foreach ($_FILES["img"]["tmp_name"] as $value) 
{
	$img = addslashes(file_get_contents($value));
	$rm->addimg($last_id,$img);
}

/*
$logg = new cLogg();
$logg->setProcess("اضافة محظر");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);*/

header("Location:../html/PSUser_ViewReport.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewAddReport.php");


}

 ?>