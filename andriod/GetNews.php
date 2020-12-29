<?php 


require_once '../php/lib_db.php';

function comparatorFunc( $w1, $w2) 
    {    
        // If $x is equal to $y it returns 0 
        if ($w1["datetime"] < $w2["datetime"]) 
            return TRUE;
        else
        	return FALSE;
    }


$wanteds = getWanted();
$carstolens = getCarStolen();

$news = array();

foreach ($wanteds as $wanted) {
	$news[] = array(
		'text'=> $wanted->getName().' مطلوب صاحب رقم وطني رقم' .$wanted->getNationalNumber(),
		'datetime'=> $wanted->getDate()
	);
}

foreach ($carstolens as $carstolen) {
	$news[] = array(
		'text'=> 'سيارة مسروقة نوع '.$carstolen->getVehicleType().' '.$carstolen->getModel().' رقم الهيكل '.$carstolen->getStructureNumber().' ورقم اللوحة '.$carstolen->getPlateNumber(),
		'datetime'=> $carstolen->getDate(),
	);
}


usort($news,"comparatorFunc");

//print_r($news);

echo json_encode($news);



 ?>