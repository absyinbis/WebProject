<?php 

require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('5ba8684a', 'cU8lK4THh98MJ9lI');
$client = new \Nexmo\Client($basic);


try{
	$verification = new \Nexmo\Verify\Verification($_POST["rq"]);
    $result = $client->verify()->check($verification, $_POST["code"]);
    echo "yes";
}catch(Exception $e){
echo $e;

}





 ?>