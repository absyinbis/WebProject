<?php 

session_start();
require_once 'MangerReport.php';

$rm = cReportManger::getInstance();
try{


$rm->deletereport($_POST["id"]);


$account = unserialize($_SESSION["ACCOUNT"]);

$logg = new cLogg();
$logg->setProcess("اغلاق المحظر");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/PSUser_ViewReport.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
        header("Location:../html/PSUser_ViewDetailsReport.php");

}

 ?>