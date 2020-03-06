<?php 


require_once 'MangerPoliceStation.php';

$psm = cPoliceStationManger::getInstance();
try{


$psm->deletepolicestation($_POST["id"]);


header("Location:../html/AdminViewPoliceStation.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/AdminViewPoliceStation.php");

}

 ?>