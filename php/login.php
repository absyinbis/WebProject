<?php 
session_start();

require_once 'MangerPoliceStation.php';



$psm = cPoliceStationManger::getInstance();
try
	{   

        $_SESSION["ACCOUNT"] = serialize($psm->login($_POST["username"],$_POST["password"]));
        $ps = unserialize($_SESSION["ACCOUNT"]);

        switch ($ps->getAccess()) {
        	case 0:
        		header("Location:../html/AdminViewPoliceStation.php");
        		break;
        	
        	case 1:
        		header("Location:../html/PS_ViewUser.php");
        		break;

        	case 2:
        		echo "neyaba";
                        break;

                case 3:
                        header("Location:../html/PSUser_ViewWanted.php");
        }

		
	}
catch(Exception $e)
	{
		//$x = '5555';
		//$x = $e->getMessage();
		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/LoginView.php");
	}

 ?>
