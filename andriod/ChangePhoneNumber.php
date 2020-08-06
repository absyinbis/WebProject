<?php 

require_once '../php/lib_db.php';


changePhoneNumber($_POST["id"],$_POST["access"],$_POST["phonenumber"]);

echo "done";


 ?>