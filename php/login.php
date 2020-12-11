<?php 
session_start();

require_once 'MangerUser.php';



$um = cUserManger::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($um->login($_POST["username"],$_POST["password"]));
        header("Location:../html/Main.php");

		
	}
catch(Exception $e)
	{
		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/LoginView.php");
	}

 ?>
