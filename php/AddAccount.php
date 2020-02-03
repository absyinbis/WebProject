<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerAccount.php';

$am = cAccountManager::getInstance();
try{
$account = new cAccount();
$account->setName($_POST["name"]);
$account->setUserName($_POST["username"]);
$account->setPassword($_POST["password"]);
$account->setState("1");

$am->addpolicestation($account);
header("Location:../html/AdminView.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminView.php");

}

 ?>