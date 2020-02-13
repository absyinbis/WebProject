<?php 

session_start();

require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$um->deleteuser($_POST["id"]);
$um->logg("Delete","user",date("yy-m-d"),$account->getId());

if ($account->getAccess() == 0)
header("Location:../html/AdminViewUser.php");
else
header("Location:../html/PS_ViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewUser.php");
}

 ?>