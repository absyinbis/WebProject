<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerAccount.php';

$am = cAccountManager::getInstance();
try{
$account = new cAccount();
$account->setId($_POST["id"]);
$account->setName($_POST["name"]);
$account->setUserName($_POST["username"]);
$account->setPassword($_POST["password"]);
$account->setState("1");

$am->editpolicestation($account);
header("Location:../html/AdminViewPoliceStation.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");

}

 ?>