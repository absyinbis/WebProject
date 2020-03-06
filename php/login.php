<?php 
session_start();

require_once 'MangerPoliceStation.php';



$psm = cPoliceStationManger::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($psm->login($_POST["username"],$_POST["password"]));
        $ps = unserialize($_SESSION["ACCOUNT"]);

        if($ps->getAccess() == 0)
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
