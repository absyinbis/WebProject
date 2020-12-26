<?php 
session_start();

require_once 'lib_obj.php';
require_once 'MangerWanted.php';
require_once 'C:\Users\FreeDomLy\vendor\autoload.php';


$wm = cWantedManger::getInstance();
$fb = new \Facebook\Facebook([
  'app_id' => '804961460289822',
  'app_secret' => '85459b7d0418655d2e23f09203ce2aad',
  'default_graph_version' => 'v9.0', 
]);

try{

$account = unserialize($_SESSION["ACCOUNT"]);

$wanted = new cWanted();

$wanted->setName($_POST["name"]);
$wanted->setNationalNumber($_POST["nationalnumber"]);
$wanted->setReportId($_POST["reportid"]);
$wanted->setDate(date('Y/m/d H:i:s'));
$wanted->setWho($account->getWho());
$wanted->setUser($account->getId());
$wanted->setState(1);

$wm->addwanted($wanted);


$logg = new cLogg();
$logg->setProcess("اضافة مطلوب");
$logg->setUser_Id($account->getId());
$logg->setAddDate(date("Y-m-d"));
$logg->setPS_Id($account->getWho());
addLogg($logg);


// Returns a `Facebook\FacebookResponse` object
$response = $fb->post(
    '/100488161649466/feed',
    array (
      'message' => "".$_POST["name"]." صاحب رقم وطني ".$_POST["nationalnumber"]." مطلوب علي من يتعرف عليه تبلغنا",
    ),
    'EAALcG7HmAR4BAKtE09AxZBYJePVGLkzOHlPwXAFfxTLg5AfFlKYZC7aE4dOwOAFZCsr49hbsaZAeYE2NlYCIK5DNxvCt8Ta7D9ZBb7aBkHLi6nFuqgK6jXitEZBUccqwNZCQZB8bSJ6wsCRDIQ5PnjV9TflIUkMjFjuew6rjKmTEVloEPMZBcw7ZBbxey4PbjHELZAp8dtRNmwoOgZDZD',
  );
$graphNode = $response->getGraphNode();
/* handle the result */


header("Location:../html/PSUser_ViewWanted.php");

}

catch(Exception $e){

		$_SESSION["ERROR"] = $e->getMessage();
		header("Location:../html/PSUser_ViewAddWanted.php");


}

 ?>