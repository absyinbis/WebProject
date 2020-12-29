<?php 

require_once '../php/lib_db.php';
require_once '../AES/AesCtr.php';


changePassword($_POST["id"],AesCtr::encrypt($_POST["password"],'absy',256));

echo "done";

 ?>