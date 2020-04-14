<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerWanted.php';

$wm = cWantedManger::getInstance();
try{

$img = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));

$account = unserialize($_SESSION["ACCOUNT"]);

$wanted = new cWanted();

$wanted->setName($_POST["name"]);
$wanted->setImg($img);
$wanted->setNationalNumber($_POST["nationalnumber"]);
$wanted->setReportId($_POST["reportid"]);
$wanted->setDate(date("Y/m/d"));
$wanted->setWho($account->getWho());
$wanted->setUser($account->getId());
$wanted->setState(1);

$wm->addwanted($wanted);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());

header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		//header("Location:../html/PSUser_ViewAddWanted.php");
echo $_SESSION["ERROR"];

}

 ?>