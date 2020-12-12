<?php 
session_start();

require_once 'lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);

try{

if(isset($_SESSION["id"]))
	$id = $_SESSION["id"];
else
	$id = $account->getId();

changePassword($id,$_POST["password"]);

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