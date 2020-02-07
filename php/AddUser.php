<?php 


session_start();

require_once 'lib_obj.php';
require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{
$user = new cUser();
$user->setName($_POST["name"]);
$user->setUserName($_POST["username"]);
$user->setPassword($_POST["password"]);
$user->setPhoneNumber($_POST["phonenumber"]);
$user->setwho("1");

$um->adduser($user);

header("Location:../html/AdminViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewUser.php");
}





 ?>