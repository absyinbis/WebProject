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
$report->setPhoneNumber($_POST["phonenumber"]);
$report->setImg("");
$report->setDate(date("Y/m/d"));
$report->setWho($account->getWho());
$report->setUser($account->getId());
$report->setState(1);

$last_id = $rm->addreport($report);

foreach ($_FILES["img"]["tmp_name"] as $value) 
{
	$img = addslashes(file_get_contents($value));
	$rm->addimg($last_id,$img);
}

//header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		//header("Location:../html/PSUser_ViewWanted.php");


}

 ?>