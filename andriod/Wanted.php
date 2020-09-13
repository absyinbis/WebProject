<?php 

require_once '../php/lib_db.php';

$wanted = checkWanted($_POST["searchtext"]);
$person = getPeopleByNationalNumber($_POST["searchtext"]);

if($person != "empty")
{
	if ($wanted != "empty") {
    	$arryjson = array('name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص مطلوب');
    	echo json_encode($arryjson);
	}
	else
	{
		$arryjson = array('name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص غير مطلوب');
    	echo json_encode($arryjson);
	}
}
echo "not found";

 ?>