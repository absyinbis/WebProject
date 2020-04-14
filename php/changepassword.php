<?php 
session_start();

require_once 'lib_db.php';

try{

changePassword($_SESSION["id"],$_SESSION["access"],$_POST["passowrd"]);

header("Location:../html/LoginView.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		//header("Location:../html/PSUser_ViewUser.php");


}


 ?>