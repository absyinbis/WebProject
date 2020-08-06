<?php 

require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('eebda345', 'UMsfm07kdUwcS93s');
$client = new \Nexmo\Client($basic);


try{
	$verification = new \Nexmo\Verify\Verification($_POST["rq"]);
    $result = $client->verify()->check($verification, $_POST["code"]);
    echo "yes";
}catch(Exception $e){
echo $e;

}





 ?>