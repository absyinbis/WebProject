<?php 
session_start();

require_once 'lib_db.php';

try{
$account = unserialize($_SESSION["ACCOUNT"]);


changeUserName($account->getId(),$account->getAccess(),$_POST["username"]);

$logg = new cLogg();
$logg->setProcess("تغير اسم المستخدم");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);

switch ($account->getAccess()) {
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
                header("Location:../html/PSUser_SettingView.php");
        }


}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/ChangePassword.php");


}


 ?>