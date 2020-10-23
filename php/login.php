<?php 
session_start();

require_once 'MangerPoliceStation.php';



$psm = cPoliceStationManger::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($psm->login($_POST["username"],$_POST["password"]));
        header("Location:../html/Main.php");

		
	}
catch(Exception $e)
	{
		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/LoginView.php");
	}

 ?>
