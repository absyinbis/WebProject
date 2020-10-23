<?php 
session_start();

require_once 'MangerUser.php';
$account = unserialize($_SESSION["ACCOUNT"]);

$um = cUserManger::getInstance();
try{


$um->deleteuser($_POST["id"]);


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