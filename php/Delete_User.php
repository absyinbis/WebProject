<?php 

require_once 'MangerUser.php';

$um = cUserManger::getInstance();
try{


$um->deleteuser($_POST["id"]);


header("Location:../html/AdminViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewUser.php");


}

 ?>