<?php 

require_once '../php/MangerUser.php';



$um = cUserManger::getInstance();
try
{
       $result = $um->login($_POST["username"],$_POST["password"]);

       	$arryjson = array('id' => $result->getId(),'name' =>$result->getName(),
                          'username' =>$result->getUserName(),'password' =>$result->getPassword(),
                          'phonenumber' =>$result->getPhoneNumber(),'access' =>$result->getAccess(),
                          'rq' =>'11111');

       echo json_encode($arryjson);
}
catch(Exception $e)
{
        echo $e->getMessage();
}

 ?>