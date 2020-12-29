<?php
require_once '../php/lib_db.php'; 
require_once 'C:\Users\FreeDomLy\vendor\autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('5ba8684a', 'cU8lK4THh98MJ9lI');
$client = new \Nexmo\Client($basic);

$result = getUserByUserName($_POST["username"]);

if(is_null($result)){
  echo "Not Found";
  
}else{
    $verification = $client->verify()->start([ 
            'number' => '218'.$result->getPhoneNumber(),
            'brand'  => 'Vonage',
            'code_length'  => '4']);


  $arryjson = array('id' => $result->getId(),'name' =>$result->getName(),
          'username' =>$result->getUserName(),'password' =>$result->getPassword(),
          'phonenumber' =>$result->getPhoneNumber(),'access' =>$result->getAccess(),
          'rq'=>$verification->getRequestId());

    echo json_encode($arryjson);
}


 ?>