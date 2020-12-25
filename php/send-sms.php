<?php
session_start();

require_once 'MangerUser.php';
require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('adf3cbb8', 'yR9f8OdUWvGjv6Ux');
$client = new \Nexmo\Client($basic);


try{

	$um = cUserManger::getInstance();
	$account = $um->forgetpassword($_POST["username"]);
	$id = $account->getId();
	$phonenumber = $account->getPhoneNumber();


	$verification = $client->verify()->start([ 
            'number' => '218'.$phonenumber,
            'brand'  => 'Vonage',
            'code_length'  => '4']);

	$_SESSION["Request_Id"] = $verification->getRequestId();
	$_SESSION["id"] = $id;

	header("Location:../html/PINCode.php");
}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/ForgetPassword.php");
}

?>