<?php
session_start();

require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('adf3cbb8', 'yR9f8OdUWvGjv6Ux');
$client = new \Nexmo\Client($basic);

$request_id = $_SESSION["Request_Id"];

try{

	$verification = new \Nexmo\Verify\Verification($request_id);
    $result = $client->verify()->check($verification, $_POST["code"]);
    header("Location:../html/ChangePassword.php");

}catch(Exception $e) {

	$_SESSION["ERROR"] = $e->getMessage();
	header("Location:../html/PINCode.php");
	
}


?>