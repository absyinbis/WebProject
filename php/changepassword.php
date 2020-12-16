<?php 
session_start();

require_once 'lib_db.php';
require_once 'MangerUser.php';

$um = cUserManger::getInstance();
$account = unserialize($_SESSION["ACCOUNT"]);

try{

if(isset($_SESSION["id"]))
	$id = $_SESSION["id"];
else
	$id = $account->getId();

$um->changepassword($id,$_POST["password"],$_POST["password1"]);

$logg = new cLogg();
$logg->setProcess("تغير كلمة المرور");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);

if(isset($_SESSION["Request_Id"])){
	session_destroy();
	header("Location:../html/LoginView.php");
}
else
	header("Location:../html/PSUser_SettingView.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_SettingView.php");

}


 ?>