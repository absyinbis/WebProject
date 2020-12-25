<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerCause.php';

$cm = cCauseManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$cause = new cCause();

$cause->setCauseType($_POST["cause_type"]);
$cause->setReportId($_POST["report_id"]);
$cause->setNationalNumber($_POST["national_number"]);
$cause->setWho($account->getWho());
$cause->setUser($account->getId());
$cause->setDate(date("Y/m/d"));
$cause->setState("1");

$cm->addcause($cause);

$logg = new cLogg();
$logg->setProcess("اضافة سيارة مسروقة");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);

header("Location:../html/PSNyaba_ViewCause.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSNyaba_ViewAddCause.php");


}

 ?>