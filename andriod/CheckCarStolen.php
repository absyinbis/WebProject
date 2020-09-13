<?php 

require_once '../php/lib_db.php';


$car = getCar($_POST["searchtext"]);
$carstolen = checkCarStolen($_POST["searchtext"]);

if(!is_null($car))
{
    $id_number = getIdNumber($_POST["searchtext"]);
    $wanted = checkWanted($id_number);
    $person = getPeopleByNationalNumber($id_number);
      if($carstolen != "empty")
      {
            if ($wanted != "empty") {
                  $arryjson = array(
                        'structureNumber'=> $car->getStructureNumber(),
                        'plateNumber'=> $car->getPlateNumber(),
                        'vehicleType'=> $car->getVehicleType(),
                        'vehicleModel'=> $car->getModel(),
                        'vehicleYear'=> $car->getYearCar(),
                        'carState'=> '',
                        'name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص مطلوب'
                  );
                  echo json_encode($arryjson);
            }
            else
            {
                  $arryjson = array(
                        'structureNumber'=> $car->getStructureNumber(),
                        'plateNumber'=> $car->getPlateNumber(),
                        'vehicleType'=> $car->getVehicleType(),
                        'vehicleModel'=> $car->getModel(),
                        'vehicleYear'=> $car->getYearCar(),
                        'carState'=> 'السيارة مسروقة',
                        'name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص غير مطلوب'
                  );
                  echo json_encode($arryjson);
            }
      }
      else
      {
            if ($wanted != "empty") {
                  $arryjson = array(
                        'structureNumber'=> $car->getStructureNumber(),
                        'plateNumber'=> $car->getPlateNumber(),
                        'vehicleType'=> $car->getVehicleType(),
                        'vehicleModel'=> $car->getModel(),
                        'vehicleYear'=> $car->getYearCar(),
                        'carState'=> 'السيارة ليست مسروقة',
                        'name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص مطلوب'
                  );
                  echo json_encode($arryjson);
            }
            else
            {
                  $arryjson = array(
                        'structureNumber'=> $car->getStructureNumber(),
                        'plateNumber'=> $car->getPlateNumber(),
                        'vehicleType'=> $car->getVehicleType(),
                        'vehicleModel'=> $car->getModel(),
                        'vehicleYear'=> $car->getYearCar(),
                        'carState'=> 'السيارة ليست مسروقة',
                        'name'=> $person->getName(),
                        'motherName'=> $person->getMotherName(),
                        'nationalNumber'=> $person->getNationalNumber(),
                        'wantedState'=> 'الشخص غير مطلوب'
                  );
                  echo json_encode($arryjson);
            }
      }


}else{

      if($carstolen != "empty")
      {
          $arryjson = array(
                        'structureNumber'=> $carstolen->getStructureNumber(),
                        'plateNumber'=> $carstolen->getPlateNumber(),
                        'vehicleType'=> $carstolen->getVehicleType(),
                        'vehicleModel'=> $carstolen->getModel(),
                        'vehicleYear'=> $carstolen->getYearCar(),
                        'carState'=> 'السيارة لمسروقة',
                        'name'=> '',
                        'motherName'=> '',
                        'nationalNumber'=> '',
                        'wantedState'=> ''
                  );
                  echo json_encode($arryjson);
      }
      else
      {
            $arryjson = array(
                        'structureNumber'=> '',
                        'plateNumber'=> '',
                        'vehicleType'=> '',
                        'vehicleModel'=> '',
                        'vehicleYear'=> '',
                        'carState'=> 'السيارة ليست مسروقة',
                        'name'=> '',
                        'motherName'=> '',
                        'nationalNumber'=> '',
                        'wantedState'=> ''
                  );
                  echo json_encode($arryjson);
      }
}

      
 ?>