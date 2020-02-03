<?php 

session_start();

require_once 'MangerAccount.php';

$am = cAccountManager::getInstance();
try{


$am->deletepolicestation($_POST["id"]);
header("Location:../html/AdminView.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminView.php");

}

 ?>