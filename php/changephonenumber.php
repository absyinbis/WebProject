<?php 
session_start();

require_once 'lib_db.php';

try{
$account = unserialize($_SESSION["ACCOUNT"]);


changePhoneNumber($account->getId(),$_POST["phonenumber"]);

$account->setPhoneNumber($_POST["phonenumber"]);
$_SESSION["ACCOUNT"] = serialize($account);

$logg = new cLogg();
$logg->setProcess("تغير اسم المستخدم");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/PSUser_SettingView.php");


}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_SettingView.php");


}


 ?>