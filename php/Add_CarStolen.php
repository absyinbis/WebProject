<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerCarStolen.php';

$cs = cCarStolenManger::getInstance();
try{

//$img = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));

$account = unserialize($_SESSION["ACCOUNT"]);

$car = new cCarStolen();

$car->setStructureNumber($_POST["structurenumber"]);
$car->setPlateNumber($_POST["platenumber"]);
$car->setVehicleType($_POST["car-makes"]);
$car->setModel($_POST["car-models"]);
$car->setYearCar($_POST["car-years"]);
$car->setColor($_POST["color"]);
$car->setDescription($_POST["des"]);
$car->setPhoneNumber(123);
$car->setDate(date("Y/m/d"));
$car->setWho($account->getWho());
$car->setUser($account->getId());
$car->setState(1);

$cs->addcarstolen($car);
//$um->logg("Add","PS",date("yy-m-d"),$account->getId());

//header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		//header("Location:../html/PSUser_ViewWanted.php");


}

 ?>