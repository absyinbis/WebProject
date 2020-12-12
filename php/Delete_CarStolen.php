<?php 

session_start();
require_once 'MangerCarStolen.php';

$cs = cCarStolenManger::getInstance();

try{


$cs->deletecarstolen($_POST["id"]);


$account = unserialize($_SESSION["ACCOUNT"]);

$logg = new cLogg();
$logg->setProcess("ازالة سيارة مسروقة");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/PSUser_ViewCarStolen.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
        header("Location:../html/PSUser_ViewDetailsCarStolen.php");

}

 ?>