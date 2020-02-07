<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{
$user = new cUser();
$user->setId($_POST["id"]);
$user->setName($_POST["name"]);
$user->setUserName($_POST["username"]);
$user->setPassword($_POST["password"]);
$user->setPhoneNumber($_POST["phonenumber"]);

$um->edituser($user);
header("Location:../html/AdminViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewUser.php");
}

 ?>