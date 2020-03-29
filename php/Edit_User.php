<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerUser.php';

$um = cUserManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$user = new cUser();

$user->setId($_POST["id"]);
$user->setName($_POST["name"]);
$user->setUserName($_POST["username"]);
$user->setPassword($_POST["password"]);
$user->setPhoneNumber($_POST["phonenumber"]);
$user->setAccess($_POST["access"]);

$um->edituser($user);

if ($account->getAccess() == 0)
	header("Location:../html/AdminViewUser.php");
	else
	header("Location:../html/PSUser_ViewUser.php");


}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewUser.php");


}












 ?>