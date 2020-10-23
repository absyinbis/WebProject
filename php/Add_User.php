<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerUser.php';

$um = cUserManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$user = new cUser();

$user->setName($_POST["name"]);
$user->setUserName($_POST["username"]);
$user->setPassword($_POST["password"]);
$user->setPhoneNumber($_POST["phonenumber"]);
$user->setAccess($_POST["access"]);
$user->setWho($account->getId());
$user->setState("1");

$um->adduser($user);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());
if ($account->getAccess() == 0)
	header("Location:../html/AdminViewUser.php");
	else
	header("Location:../html/PS_ViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		if ($account->getAccess() == 0)
			header("Location:../html/AdminViewUser.php");
		else
			header("Location:../html/PS_ViewUser.php");

}

 ?>