<?php 

require_once 'MangerUser.php';

$um = cUserManger::getInstance();
try{


$um->deleteuser($_POST["id"]);


header("Location:../html/PSUser_ViewUser.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewUser.php");


}

 ?>