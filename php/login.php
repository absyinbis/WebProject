<?php 
session_start();

require_once 'MangerAccount.php';



$am = cAccountManager::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($am->login($_POST["username"],$_POST["password"]));
        $state = unserialize($_SESSION["ACCOUNT"]);

        if($state->getState() == 0)
        	header("Location:../html/AdminViewPoliceStation.php");
        else
        	header("Location:../html/PoliceStationView.php");

		
	}
catch(Exception $e)
	{
		//$x = '5555';
		//$x = $e->getMessage();
		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/LoginView.php");
	}

 ?>
