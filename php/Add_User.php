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
$user->setDate(date("Y-m-d"));

if($account->getAccess() == "1")
	$user->setWho($account->getWho());
else
	if ($_POST["access"] == 0)
		$user->setWho(NULL);
	else
		$user->setWho($_POST["ps_id"]);

$user->setState("1");

$um->adduser($user);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());
if ($account->getAccess() == 0)
	header("Location:../html/AdminViewUser.php");
	else{
	$logg = new cLogg();
	$logg->setProcess("اضافة مستخدم");
	$logg->setUser_Id($account->getId());
	$logg->setAddDate(date("Y-m-d"));
	$logg->setPS_Id($account->getWho());
	addLogg($logg);
	header("Location:../html/PS_ViewUser.php");
	}

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		if ($account->getAccess() == 0)
			header("Location:../html/AdminViewUser.php");
		else
			header("Location:../html/PS_ViewUser.php");

}

 ?>