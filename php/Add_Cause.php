<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerUser.php';

$um = cUserManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$cause = new cCause();

$cause->setCauseId($_POST["cause_id"]);
$cause->setReportId($_POST["report_id"]);
$cause->setNationalNumber($_POST["national_number"]);
$cause->setWho($account->getWho());
$cause->setUser($account->getId());
$cause->setDate(date("Y/m/d"));
$cause->setState("1");

$um->addcause($cause);
$_SESSION["ERROR"] = "تمت العملية بنجاح";
header("Location:../html/PSNyaba_ViewAddCause.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSNyaba_ViewAddCause.php");


}

 ?>