<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerPoliceStation.php';

$psm = cPoliceStationManger::getInstance();
try{

//$account = unserialize($_SESSION["ACCOUNT"]);

$ps = new cPoliceStation();

$ps->setName($_POST["name"]);
$ps->setUserName($_POST["username"]);
$ps->setPassword($_POST["password"]);
$ps->setPhoneNumber($_POST["phonenumber"]);
$ps->setAccess($_POST["access"]);
$ps->setState("1");

$psm->addpolicestation($ps);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());

header("Location:../html/AdminViewPoliceStation.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");


}

 ?>