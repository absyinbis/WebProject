<?php 

require_once '../php/lib_db.php';



      $car = checkCar($_POST["carstolennumber"]);
if($car == true)
{
      $carstolen = checkCarStolen($_POST["carstolennumber"]);
      if($carstolen != "empty")
      {
            $id_number = getIdNumber($_POST["carstolennumber"]);
            $wanted = checkWanted($id_number);
            if ($wanted != "empty") {
                  $arryjson = array('structure_number' => $carstolen->getStructureNumber(),
                                          'plate_number' =>$carstolen->getPlateNumber(),
                                    'vehicle_type' =>$carstolen->getVehicleType()." "
                                                     .$carstolen->getModel()." "
                                                     .$carstolen->getYearCar(),
                                    'description' =>$carstolen->getDescription(),
                                    'phonenumber' =>$carstolen->getPhoneNumber(),
                                    'state car' => 'السيارة مسروقة',
                                    'name' =>$wanted->getName(),
                                    'national_number' =>$wanted->getNationalNumber(),
                                    'state wanted' =>"السائق مطلوب");
                  echo json_encode($arryjson);
            }
            else
            {
                  $arryjson = array('structure_number' => $carstolen->getStructureNumber(),
                                    'plate_number' =>$carstolen->getPlateNumber(),
                                    'vehicle_type' =>$carstolen->getVehicleType()." "
                                                     .$carstolen->getModel()." "
                                                     .$carstolen->getYearCar(),
                                    'description' =>$carstolen->getDescription(),
                                    'phonenumber' =>$carstolen->getPhoneNumber(),
                                    'state car' => "السيارة مسروقة",
                                    'name' =>"",
                                    'imagewanted' =>"",
                                    'national_number' =>"",
                                    'state wanted' =>"السائق غير مطلوب");
                  echo json_encode($arryjson);
            }
      }
      else
      {
            $id_number = getIdNumber($_POST["carstolennumber"]);
            $wanted = checkWanted($id_number);
            if ($wanted != "empty") {
                  $arryjson = array('structure_number' => "",
                                    'plate_number' =>"",
                                    'vehicle_type' =>"",
                                    'description' =>"",
                                    'phonenumber' =>"",
                                    'state car' => "السيارة ليست مسروقة",
                                    'name' =>$wanted->getName(),
                                    'national_number' =>$wanted->getNationalNumber(),
                                    'state wanted' =>"السائق مطلوب");
                  echo json_encode($arryjson);
            }
            else
            {
                  $arryjson = array('structure_number' => "",
                                    'plate_number' =>"",
                                    'vehicle_type' =>"",
                                    'description' =>"",
                                    'phonenumber' =>"",
                                    'state car' => "السيارة ليست مسروقة",
                                    'name' =>$wanted->getName(),
                                    'national_number' =>$wanted->getNationalNumber(),
                                    'state wanted' =>"السائق غير مطلوب");
                  echo json_encode($arryjson);
            }
      }
}
else
{
      echo "car to found";
}




 ?>