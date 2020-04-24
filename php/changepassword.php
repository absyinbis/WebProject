<?php 
session_start();

require_once 'lib_db.php';

try{

changePassword($_SESSION["id"],$_SESSION["access"],$_POST["passowrd"]);

$logg = new cLogg();
$logg->setProcess("تغير كلمة المرور عن طريق الرسالة");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


header("Location:../html/LoginView.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/ChangePassword.php");


}


 ?>