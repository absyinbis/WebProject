<?php 
session_start();

require_once 'lib_obj.php';
require_once 'lib_db.php';
require_once 'MangerCarStolen.php';

$cs = cCarStolenManger::getInstance();
try{

$account = unserialize($_SESSION["ACCOUNT"]);

$car = new cCarStolen();

$car->setStructureNumber($_POST["structurenumber"]);
$car->setPlateNumber($_POST["platenumber"]);
$car->setVehicleType($_POST["car-makes"]);
$car->setModel($_POST["car-models"]);
$car->setYearCar($_POST["car-years"]);
$car->setColor($_POST["color"]);
$car->setDescription($_POST["des"]);
$car->setPhoneNumber($_POST["phonenumber"]);
$car->setDate(date("Y/m/d"));
$car->setWho($account->getWho());
$car->setUser($account->getId());
$car->setState(1);

$cs->addcarstolen($car);

$logg = new cLogg();
$logg->setProcess("اضافة سيارة مسروقة");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);

header("Location:../html/PSUser_ViewCarStolen.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewAddStolenCar.php");


}

 ?>