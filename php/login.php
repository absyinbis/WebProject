<?php 
session_start();

require_once 'MangerUsers.php';



$um = cUserManager::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($um->login($_POST["username"],$_POST["password"]));
        $state = unserialize($_SESSION["ACCOUNT"]);

        if($state->getAccess() == 0)
        	header("Location:../html/AdminViewPoliceStation.php");
        else
        	header("Location:../html/PS_ViewUser.php");

		
	}
catch(Exception $e)
	{
		//$x = '5555';
		//$x = $e->getMessage();
		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/LoginView.php");
	}

 ?>
