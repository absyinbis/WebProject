<?php 

session_start();

require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{


$um->deleteuser($_POST["id"]);
$um->logg("Delete","PS",date("yy-m-d"),$account->getId());

header("Location:../html/AdminViewPoliceStation.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");

}

 ?>