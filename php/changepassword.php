<?php 
session_start();

require_once 'lib_db.php';

try{

if(isset($_SESSION["id"]))
	$id = $_SESSION["id"];
else
	$id = unserialize($_SESSION["ACCOUNT"])->getId();

changePassword($id,$_POST["password"]);

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