<?php 

session_start();
require_once 'MangerWanted.php';

$wm = cWantedManger::getInstance();
try{


$wm->deletewanted($_POST["id"]);


$account = unserialize($_SESSION["ACCOUNT"]);
$logg = new cLogg();
$logg->setProcess("ازالة مطلوب");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
        header("Location:../html/PSUser_ViewDetailsWanted.php");

}

 ?>