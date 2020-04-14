<?php
session_start();

require_once 'MangerPoliceStation.php';
require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('adf3cbb8', 'yR9f8OdUWvGjv6Ux');
$client = new \Nexmo\Client($basic);


try{
	$um = cPoliceStationManger::getInstance();
	$account = $um->forgetpassword($_POST["username"]);
	$id = $account->getId();
	$phonenumber = $account->getPhoneNumber();
	$access = $account->getAccess();


	//$verification = new \Nexmo\Verify\Verification($phonenumber , 'Acme Inc');
	//$client->verify()->start($verification);

	//$_SESSION["Request_Id"] = $verification->getRequestId();
	$_SESSION["id"] = $id;
	$_SESSION["access"] = $access;

	header("Location:../html/PINCode.php");
}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/ForgetPassword.php");
}

?>