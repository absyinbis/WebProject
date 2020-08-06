<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerWanted.php';

$wm = cWantedManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$wanted = new cWanted();

$wanted->setName($_POST["name"]);
$wanted->setNationalNumber($_POST["nationalnumber"]);
$wanted->setReportId($_POST["reportid"]);
$wanted->setDate(date('Y/m/d H:i:s'));
$wanted->setWho($account->getWho());
$wanted->setUser($account->getId());
$wanted->setState(1);

$wm->addwanted($wanted);

$logg = new cLogg();
$logg->setProcess("اضافة مطلوب");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewAddWanted.php");


}

 ?>