<?php 

session_start();

require_once 'MangerUsers.php';

$um = cUserManager::getInstance();
try{


$um->deleteuser($_POST["id"]);
header("Location:../html/AdminViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewUser.php");
}

 ?>