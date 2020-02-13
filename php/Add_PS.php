<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$user = new cUser();
$user->setName($_POST["name"]);
$user->setUserName($_POST["username"]);
$user->setPassword($_POST["password"]);
$user->setPhoneNumber("");
$user->setAccess("1");
$user->setState("1");
$user->setWho($account->getId());

$um->adduser($user);
$um->logg("Add","PS",date("yy-m-d"),$account->getId());

header("Location:../html/AdminViewPoliceStation.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");


}

 ?>