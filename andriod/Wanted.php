<?php 

require_once '../php/lib_db.php';

$wanted = checkWanted($_POST["searchtext"]);
$person = getPeopleByNationalNumber($_POST["searchtext"]);

if ($wanted != "empty") {

    $arryjson = array('name' =>$wanted->getName(),
                      'national_number' =>$wanted->getNationalNumber(),
                      'wanted_state' =>"السائق مطلوب",
                      'date' =>$wanted->getDate(),
                      'who' =>$wanted->getWho());
    echo json_encode($arryjson);
}
else
echo "empty";


 ?>