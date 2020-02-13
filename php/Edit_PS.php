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
$user->setPhoneNumber("");

$um->edituser($user);
$um->logg("Edit","PS",date("yy-m-d"),$account->getId());

header("Location:../html/AdminViewPoliceStation.php");


}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");

}

 ?>